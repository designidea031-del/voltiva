<?php

namespace App\Filament\Admin\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // Left / Main Content (Span 2)
                Group::make([
                    Section::make('Category Details')
                        ->description('Define the primary category attributes and hierarchy.')
                        ->icon('heroicon-o-folder')
                        ->components([
                            Grid::make(['default' => 1, 'sm' => 2])
                                ->components([
                                    TextInput::make('name')
                                        ->label('Category Name')
                                        ->prefixIcon('heroicon-o-tag')
                                        ->placeholder('e.g. Modular Switches & Sockets')
                                        ->required()
                                        ->maxLength(255),

                                    Select::make('parent_id')
                                        ->relationship('parent', 'name')
                                        ->prefixIcon('heroicon-o-folder-open')
                                        ->label('Parent Category')
                                        ->placeholder('None (Top-Level Category)')
                                        ->searchable()
                                        ->preload()
                                        ->nullable(),
                                ]),

                            Textarea::make('description')
                                ->label('Description')
                                ->placeholder('Provide a brief overview of this category...')
                                ->rows(4),
                        ]),

                    Section::make('Search Engine Optimization (SEO)')
                        ->description('Configure meta tags for improved search engine rankings.')
                        ->icon('heroicon-o-magnifying-glass')
                        ->collapsible()
                        ->components([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->prefixIcon('heroicon-o-globe-alt')
                                ->placeholder('e.g. Best Electrical Switches & Accessories')
                                ->maxLength(255),

                            Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->placeholder('Brief summary for search engine snippet...')
                                ->rows(3),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 2]),

                // Right Column (Span 1)
                Group::make([
                    Section::make('Category Media')
                        ->description('Upload category cover or banner image.')
                        ->icon('heroicon-o-photo')
                        ->components([
                            FileUpload::make('image')
                                ->label('Category Image')
                                ->image()
                                ->disk('public')
                                ->directory('categories')
                                ->imageEditor()
                                ->helperText('Visual representation for category grids and catalogs.'),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 1]),
            ]);
    }
}
