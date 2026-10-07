<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\Widget;

class CurrentVisitsWidget extends Widget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 1,
    ];

    protected string $view = 'filament.admin.widgets.current-visits-widget';
}
