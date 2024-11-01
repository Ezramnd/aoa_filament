<?php

namespace App\Filament\Resources\PlantResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class HamaPlant extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'hamaPlant';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Jumlah Hama';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'HamaPlant',
                    'data' => [2, 4, 6, 10, 14, 7, 2],
                ],
            ],
            'xaxis' => [
                'categories' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
            'stroke' => [
                'curve' => 'smooth',
            ],
        ];
    }
}
