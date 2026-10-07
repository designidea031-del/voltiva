<?php

namespace App\Filament\Admin\Resources\PageBanners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PageBannersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('desktop_image')
                    ->label('Desktop')
                    ->disk('public')
                    ->height(46)
                    ->width(100)
                    ->extraImgAttributes(['style' => 'object-fit:cover;border-radius:6px;'])
                    ->defaultImageUrl(fn () => 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="46" viewBox="0 0 100 46"><rect width="100" height="46" fill="%23f3f4f6"/><text x="50" y="27" font-family="sans-serif" font-size="10" fill="%239ca3af" text-anchor="middle">No Image</text></svg>'),

                TextColumn::make('page_name')
                    ->label('Page Name')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('page_key')
                    ->label('Page Key')
                    ->badge()
                    ->color('primary')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Title')
                    ->limit(40)
                    ->placeholder('—')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('subtitle')
                    ->label('Subtitle')
                    ->limit(40)
                    ->placeholder('—')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('overlay_opacity')
                    ->label('Overlay')
                    ->badge()
                    ->color('gray')
                    ->formatStateUsing(fn ($state) => $state . '%')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('button_text')
                    ->label('CTA Button')
                    ->placeholder('—')
                    ->badge()
                    ->color('info')
                    ->toggleable(isToggledHiddenByDefault: true),

                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('page_name', 'asc')
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Status')
                    ->trueLabel('Active Only')
                    ->falseLabel('Inactive Only')
                    ->placeholder('All Banners'),
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
                    ->tooltip('Edit Banner'),
                DeleteAction::make()
                    ->iconButton()
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->tooltip('Delete Banner'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
