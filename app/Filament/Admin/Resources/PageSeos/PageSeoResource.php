<?php

namespace App\Filament\Admin\Resources\PageSeos;

use App\Filament\Admin\Resources\PageSeos\Pages\EditPageSeo;
use App\Filament\Admin\Resources\PageSeos\Pages\ListPageSeos;
use App\Models\PageSeo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;

class PageSeoResource extends Resource
{
    protected static ?string $model = PageSeo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMagnifyingGlass;

    protected static ?string $navigationLabel = 'Page SEO';

    protected static string|\UnitEnum|null $navigationGroup = null;

    protected static ?string $modelLabel = 'Page SEO';

    protected static ?string $pluralModelLabel = 'Page SEO Hub';

    protected static ?int $navigationSort = 8;


    public static function getPages(): array
    {
        return [
            'index' => ListPageSeos::route('/'),
            'edit'  => EditPageSeo::route('/{record}/edit'),
        ];
    }
}
