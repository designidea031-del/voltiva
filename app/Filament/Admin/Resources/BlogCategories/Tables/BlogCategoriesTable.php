<?php

namespace App\Filament\Admin\Resources\BlogCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Category Name')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->badge()
                    ->color('gray')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('posts_count')
                    ->counts('posts')
                    ->label('Articles Count')
                    ->badge()
                    ->color('info')
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
