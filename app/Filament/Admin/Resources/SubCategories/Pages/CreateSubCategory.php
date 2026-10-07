<?php

namespace App\Filament\Admin\Resources\SubCategories\Pages;

use App\Filament\Admin\Resources\SubCategories\SubCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubCategory extends CreateRecord
{
    protected static string $resource = SubCategoryResource::class;
}
