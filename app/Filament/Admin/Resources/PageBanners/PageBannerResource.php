<?php

namespace App\Filament\Admin\Resources\PageBanners;

use App\Filament\Admin\Resources\PageBanners\Pages\CreatePageBanner;
use App\Filament\Admin\Resources\PageBanners\Pages\EditPageBanner;
use App\Filament\Admin\Resources\PageBanners\Pages\ListPageBanners;
use App\Filament\Admin\Resources\PageBanners\Schemas\PageBannerForm;
use App\Filament\Admin\Resources\PageBanners\Tables\PageBannersTable;
use App\Models\PageBanner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PageBannerResource extends Resource
{
    protected static ?string $model = PageBanner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Banners';

    protected static string|\UnitEnum|null $navigationGroup = null;

    protected static ?string $modelLabel = 'Banner';

    protected static ?string $pluralModelLabel = 'Banners';

    protected static ?int $navigationSort = 7;


    public static function form(Schema $schema): Schema
    {
        return PageBannerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PageBannersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListPageBanners::route('/'),
            'create' => CreatePageBanner::route('/create'),
            'edit'   => EditPageBanner::route('/{record}/edit'),
        ];
    }
}
