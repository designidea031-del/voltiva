<?php

namespace App\Filament\Admin\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
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

                TextColumn::make('code')
                    ->label('SKU / Code')
                    ->badge()
                    ->color('gray')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Product code copied!')
                    ->toggleable(),

                TextColumn::make('title')
                    ->label('Product Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('primary')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('subCategory.title')
                    ->label('Sub Category')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('tags')
                    ->label('Color / Finish')
                    ->badge()
                    ->color(fn ($state) => match(true) {
                        str_contains(strtolower($state ?? ''), 'black') => 'gray',
                        str_contains(strtolower($state ?? ''), 'grey') => 'slate',
                        str_contains(strtolower($state ?? ''), 'wood') => 'warning',
                        default => 'success',
                    })
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('price')
                    ->label('Price')
                    ->money('INR')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('pkd')
                    ->label('PKD')
                    ->badge()
                    ->color('warning')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('size')
                    ->label('Size / Spec')
                    ->badge()
                    ->color('slate')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y, h:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('sub_category_id')
                    ->label('Sub Category')
                    ->relationship('subCategory', 'title')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('tags')
                    ->label('Color / Finish')
                    ->options([
                        'Pure White' => 'Pure White',
                        'Matt Black' => 'Matt Black',
                        'Graphite Grey' => 'Graphite Grey',
                        'Woody Finish' => 'Woody Finish',
                        'Silver Border' => 'Silver Border',
                        'White Border' => 'White Border',
                        'Copper Glass' => 'Copper Glass',
                        'Wooden Glass' => 'Wooden Glass',
                    ]),
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
                EditAction::make()
                    ->iconButton()
                    ->icon('heroicon-o-pencil-square')
                    ->color('gray')
                    ->tooltip('Edit Product'),
                DeleteAction::make()
                    ->iconButton()
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->tooltip('Delete Product'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
