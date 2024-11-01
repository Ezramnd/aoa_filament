<?php

namespace App\Filament\Resources\SprayingResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class TankBar extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'tankBar';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'TankBar';

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
                'type' => 'bar',
                'height' => 300,
                'stacked' => true,
            ],
            'plotOptions' => [
                'bar' => [
                    'vertikal' => true,
                    'barHeight' => '20%',
                    'colors' => [
                        'backgroundBarColors' => ['#40475D'],
                    ],
                ],
            ],
            'stroke' => [
                'width' => 0,
            ],
        
            'series' => [
                [
                    'data' => [64,30,8],
                ],
            ],
           
            'tooltip' => [
                'enabled' => false,
            ],
            'dataLabels' => [
                'enabled '=> false
            ],
            'xaxis' => [
                'categories' => ['1', '2', '3'], 
            ],
            'fill' => [
                'opacity' => 1,
                'type' => 'gradient',
                'gradient' => [
                    'inverseColors' => false,
                    'gradientToColors' => ['#6078ea', '#6094ea'],
                ],
            ],
            'colors' => ['#17ead9', '#40475D', '#f02fc2'],
            
        ];
    }
}
