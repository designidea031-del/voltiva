<?php

namespace App\Filament\Admin\Resources\BlogCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Topic Details')
                    ->description('Classify and structure your blog articles with clean taxonomy and search-friendly slugs.')
                    ->icon('heroicon-o-bookmark-square')
                    ->components([
                        Grid::make(['default' => 1, 'sm' => 2])
                            ->components([
                                TextInput::make('name')
                                    ->label('Category Name')
                                    ->placeholder('e.g. Electrical Safety & Innovation')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->prefix('/blog/')
                                    ->placeholder('electrical-safety')
                                    ->helperText('Unique URL identifier for this category archive.')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Textarea::make('description')
                                    ->label('Topic Description')
                                    ->placeholder('Brief overview of the editorial topics covered under this category...')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}
