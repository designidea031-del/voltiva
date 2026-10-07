<?php

namespace App\Filament\Admin\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square()
                    ->size(46),

                TextColumn::make('name')
                    ->label('Category Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('parent.name')
                    ->label('Parent Category')
                    ->badge()
                    ->color('gray')
                    ->placeholder('Top-Level')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('sub_categories_count')
                    ->counts('subCategories')
                    ->label('Sub Categories')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('products_count')
                    ->counts('products')
                    ->label('Products')
                    ->badge()
                    ->color('success')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('name', 'asc')
            ->columnManagerTriggerAction(
                fn (\Filament\Actions\Action $action) => $action
                    ->iconButton()
                    ->icon('heroicon-o-view-columns')
                    ->color('gray')
                    ->tooltip('Columns')
            )
            ->deferColumnManager(false)
            ->recordActions([
                EditAction::make()->iconButton()->icon('heroicon-o-pencil-square')->color('gray')->tooltip('Edit Category'),
                DeleteAction::make()->iconButton()->icon('heroicon-o-trash')->color('danger')->tooltip('Delete Category'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
