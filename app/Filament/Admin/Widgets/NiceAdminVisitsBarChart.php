<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class NiceAdminVisitsBarChart extends ChartWidget
{
    protected ?string $heading = 'Website Visits';

    protected ?string $description = '$395.7k  +18%  than last year';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'sm' => 2,
        'lg' => 2,
    ];

    protected ?string $maxHeight = '300px';

    public ?string $filter = '2026';

    protected function getFilters(): ?array
    {
        return [
            '2026' => '2026',
            '2025' => '2025',
        ];
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Site A',
                    'data' => [2500, 4200, 3600, 3100, 3800, 4400, 2700, 3500, 3100, 4100, 3300, 2900],
                    'backgroundColor' => '#000000',
                    'borderRadius' => 5,
                    'barThickness' => 11,
                ],
                [
                    'label' => 'Site B',
                    'data' => [2300, 2800, 2900, 3900, 2400, 3100, 2600, 4100, 2300, 2900, 2100, 4000],
                    'backgroundColor' => '#b7b7b7',
                    'borderRadius' => 5,
                    'barThickness' => 11,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                    'align' => 'end',
                    'labels' => [
                        'usePointStyle' => true,
                        'pointStyle' => 'circle',
                        'padding' => 16,
                        'font' => ['size' => 11, 'weight' => 600],
                        'color' => '#64748b',
                    ],
                ],
            ],
            'scales' => [
                'x' => [
                    'stacked' => true,
                    'grid' => ['display' => false],
                    'ticks' => ['color' => '#94a3b8', 'font' => ['size' => 11]],
                ],
                'y' => [
                    'stacked' => true,
                    'grid' => ['color' => '#f8fafc', 'lineWidth' => 1],
                    'ticks' => [
                        'color' => '#94a3b8',
                        'font' => ['size' => 11],
                    ],
                    'border' => ['display' => false],
                ],
            ],
        ];
    }
}
