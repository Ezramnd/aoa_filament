<?php

namespace App\Filament\Resources\PlantResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class Category extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'Category';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Kategori Hama';

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
                        'horizontal' => true,
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
                        'data' => [64,30,7],
                    ],
                ],
               
                'tooltip' => [
                    'enabled' => false,
                ],
                'dataLabels' => [
                    'enabled '=> false
                ],
                'xaxis' => [
                    'categories' => ['Tinggi', 'Sedang', 'Rendah'], 
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
