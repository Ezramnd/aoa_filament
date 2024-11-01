<?php

namespace App\Filament\Resources\PlantResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class Health extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'health';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Health';

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
                'type' => 'radialBar',
                'height' => 350,
                'width'=> 380,
            ],
            'plotOptions' => [
                'radialBar'=> [
                  'size'=> 'undefined',
                  'inverseOrder'=> true,
                  'hollow'=> [
                    'margin'=> 5,
                    'size'=> '48%',
                    'background'=> 'transparent',
            
                  ],
                  'track'=> [
                    'show'=> false,
                  ],
                  'startAngle'=> -180,
                  'endAngle'=> 180
                  
                ],
            ],
            'stroke'=> [
                'lineCap'=> 'round'
            ],
            'series' => [44, 55, 67],
            'labels' => ['Suhu( °)', 'Kelembaban(%)', 'pH tanah(pH)'],
            'legend'=> [
                'show'=> true,
                'floating'=> true,
                'position'=> 'right',
                'offsetX'=> 20,
                'offsetY'=> 210,
            ],
        ];
    }
}
