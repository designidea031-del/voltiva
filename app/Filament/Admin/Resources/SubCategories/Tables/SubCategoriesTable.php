<?php

namespace App\Filament\Admin\Resources\SubCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SubCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Sub Category Title')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Parent Category')
                    ->badge()
                    ->color('primary')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('products_count')
                    ->counts('products')
                    ->label('Total Products')
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
            ->defaultSort('title', 'asc')
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Filter by Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->filtersTriggerAction(
                fn (\Filament\Actions\Action $action) => $action
                    ->button()
                    ->label('Filter')
                    ->icon('heroicon-o-funnel')
                    ->color('gray')
            )
            ->columnManagerTriggerAction(
                fn (\Filament\Actions\Action $action) => $action
                    ->iconButton()
                    ->icon('heroicon-o-view-columns')
                    ->color('gray')
                    ->tooltip('Columns')
            )
            ->deferColumnManager(false)
            ->recordActions([
                EditAction::make()->iconButton()->icon('heroicon-o-pencil-square')->color('gray')->tooltip('Edit Sub Category'),
                DeleteAction::make()->iconButton()->icon('heroicon-o-trash')->color('danger')->tooltip('Delete Sub Category'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
