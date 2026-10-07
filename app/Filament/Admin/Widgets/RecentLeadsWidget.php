<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class RecentLeadsWidget extends Widget
{
    protected static ?int $sort = 6;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 3,
        'xl' => 3,
    ];

    protected string $view = 'filament.admin.widgets.recent-leads-widget';
}
