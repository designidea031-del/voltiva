<?php

namespace App\Filament\Admin\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(['default' => 1, 'lg' => 3])
            ->components([
                // Left / Main Column (Span 2)
                Group::make([
                    Section::make('General Information')
                        ->description('Core details, code, and categorization of the product.')
                        ->icon('heroicon-o-cube')
                        ->components([
                            TextInput::make('title')
                                ->label('Product Title')
                                ->placeholder('e.g. ACCURA SWITCH & ACCESSORIES (ROCKER)')
                                ->required()
                                ->maxLength(255),

                            Grid::make(['default' => 1, 'sm' => 2])
                                ->components([
                                    TextInput::make('code')
                                        ->label('Product Code / SKU')
                                        ->prefixIcon('heroicon-o-qr-code')
                                        ->placeholder('e.g. 112232')
                                        ->maxLength(255),

                                    TextInput::make('size')
                                        ->label('Size / Specification')
                                        ->prefixIcon('heroicon-o-adjustments-horizontal')
                                        ->placeholder('e.g. 12 / 1-Way / 16A')
                                        ->maxLength(255),

                                    Select::make('category_id')
                                        ->label('Category')
                                        ->prefixIcon('heroicon-o-folder')
                                        ->relationship('category', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->live()
                                        ->afterStateUpdated(fn ($set) => $set('sub_category_id', null))
                                        ->placeholder('Select Category')
                                        ->nullable(),

                                    Select::make('sub_category_id')
                                        ->label('Sub Category')
                                        ->prefixIcon('heroicon-o-rectangle-stack')
                                        ->relationship(
                                            name: 'subCategory',
                                            titleAttribute: 'title',
                                            modifyQueryUsing: fn ($query, $get) => filled($get('category_id'))
                                                ? $query->where('category_id', $get('category_id'))
                                                : $query
                                        )
                                        ->searchable()
                                        ->preload()
                                        ->placeholder('Select Sub Category')
                                        ->nullable(),

                                    TextInput::make('tags')
                                        ->label('Color / Finish')
                                        ->prefixIcon('heroicon-o-paint-brush')
                                        ->placeholder('e.g. Pure White, Matt Black, Graphite Grey')
                                        ->maxLength(255),
                                ]),
                        ]),

                    Section::make('Pricing & Packaging')
                        ->description('Configure pricing in INR and standard box packaging quantity.')
                        ->icon('heroicon-o-currency-rupee')
                        ->components([
                            Grid::make(['default' => 1, 'sm' => 2])
                                ->components([
                                    TextInput::make('price')
                                        ->label('Unit Price')
                                        ->numeric()
                                        ->prefix('₹')
                                        ->placeholder('0.00'),

                                    TextInput::make('pkd')
                                        ->label('PKD (Packaging Quantity)')
                                        ->prefixIcon('heroicon-o-archive-box')
                                        ->numeric()
                                        ->placeholder('e.g. 12')
                                        ->helperText('Number of units per standard carton/packaging.'),
                                ]),
                        ]),

                    Section::make('Product Description')
                        ->description('Detailed specifications, features, or catalog notes.')
                        ->icon('heroicon-o-document-text')
                        ->collapsible()
                        ->components([
                            Textarea::make('description')
                                ->label('Description')
                                ->placeholder('Enter detailed product specifications, features, material grades, application notes...')
                                ->rows(5),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 2]),

                // Right Column (Span 1)
                Group::make([
                    Section::make('Product Media')
                        ->description('Upload main cover and catalog gallery.')
                        ->icon('heroicon-o-photo')
                        ->components([
                            FileUpload::make('image')
                                ->label('Main Featured Image')
                                ->image()
                                ->disk('public')
                                ->directory('products')
                                ->imageEditor()
                                ->helperText('Primary photo shown in catalog and lists.'),

                            SpatieMediaLibraryFileUpload::make('gallery')
                                ->label('Product Gallery')
                                ->collection('default')
                                ->multiple()
                                ->reorderable()
                                ->helperText('Additional angles and variants.'),
                        ]),
                ])
                ->columnSpan(['default' => 1, 'lg' => 1]),
            ]);
    }
}
