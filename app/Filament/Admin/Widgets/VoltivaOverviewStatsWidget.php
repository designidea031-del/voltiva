<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class VoltivaOverviewStatsWidget extends Widget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 3,
        'xl' => 3,
    ];

    protected string $view = 'filament.admin.widgets.voltiva-overview-stats-widget';
}
