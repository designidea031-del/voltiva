<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class NiceAdminStatsWidget extends Widget
{
    protected static ?int $sort = 5;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 3,
    ];

    protected string $view = 'filament.admin.widgets.nice-admin-stats-widget';
}
