<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\VoltivaMasterDashboardWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?int $navigationSort = -2;

    public function getHeading(): string
    {
        return '';
    }

    public function getColumns(): int | array
    {
        return 1;
    }

    public function getWidgets(): array
    {
        return [
            VoltivaMasterDashboardWidget::class,
        ];
    }
}
