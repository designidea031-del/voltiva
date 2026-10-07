<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class CampaignPerformanceWidget extends Widget
{
    protected static ?int $sort = 6;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 1,
    ];

    protected string $view = 'filament.admin.widgets.campaign-performance-widget';
}
