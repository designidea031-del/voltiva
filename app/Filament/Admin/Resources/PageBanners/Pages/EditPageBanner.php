<?php

namespace App\Filament\Admin\Resources\PageBanners\Pages;

use App\Filament\Admin\Resources\PageBanners\PageBannerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPageBanner extends EditRecord
{
    protected static string $resource = PageBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
