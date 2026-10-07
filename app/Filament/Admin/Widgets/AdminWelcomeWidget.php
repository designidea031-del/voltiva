<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class AdminWelcomeWidget extends Widget
{
    protected string $view = 'filament.admin.widgets.admin-welcome-widget';

    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 2,
    ];
}
