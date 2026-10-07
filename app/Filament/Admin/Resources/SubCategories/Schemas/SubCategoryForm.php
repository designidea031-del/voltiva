<?php

namespace App\Filament\Admin\Resources\SubCategories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SubCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sub Category Details')
                    ->description('Assign this sub category to a parent category and define its title.')
                    ->icon('heroicon-o-rectangle-stack')
                    ->components([
                        Grid::make(['default' => 1, 'sm' => 2])
                            ->components([
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->label('Parent Category')
                                    ->placeholder('Select Parent Category')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                TextInput::make('title')
                                    ->label('Sub Category Title')
                                    ->placeholder('e.g. 1-Way Switches / Rocker Series')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),
            ]);
    }
}
