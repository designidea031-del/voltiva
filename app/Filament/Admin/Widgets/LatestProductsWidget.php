<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Product;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestProductsWidget extends TableWidget
{
    protected static ?int $sort = 7;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 2,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->query(Product::query()->latest())
            ->heading('Traffic & Product Performance')
            ->description('Live catalog metrics, SKU inventory, and target goals.')
            ->columns([
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->circular()
                    ->size(38),

                TextColumn::make('title')
                    ->label('Source / Product Title')
                    ->weight('bold')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('code')
                    ->label('SKU')
                    ->badge()
                    ->color('gray'),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('price')
                    ->label('Price')
                    ->money('INR'),

                TextColumn::make('pkd')
                    ->label('Goal (PKD)')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn ($state) => ($state ?? 10) . ' Units'),
            ])
            ->recordActions([
                EditAction::make()
                    ->url(fn (Product $record): string => route('filament.admin.resources.products.edit', ['record' => $record])),
            ])
            ->paginated([5]);
    }
}
