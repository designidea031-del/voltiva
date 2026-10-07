<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class KeyInsightsWidget extends Widget
{
    protected string $view = 'filament.admin.widgets.key-insights-widget';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 1,
    ];
}
