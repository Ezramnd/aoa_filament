<?php

namespace App\Filament\Resources\WeatherResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Illuminate\Support\Facades\Http;
use Filament\Widgets\ChartWidget;


class GaugeChart11 extends ApexChartWidget
{
    protected static string $chartId = 'gaugeChart11';
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Humidity Gauge';

    /**
     * Ambil data cuaca dari OpenWeatherMap API.
     */
    private function getWeatherData(): int
    {
        $apiKey = env('OPENWEATHER_API_KEY'); // API key dari .env
        $city = 'Bogor'; // Kota pilihan

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            return $response->json()['main']['humidity'] ?? 0; // Dapatkan humidity
        }

        return 0; // Default jika API gagal
    }

    /**
     * Konfigurasi opsi untuk gauge chart.
     */
    protected function getOptions(): array
    {
        $humidity = $this->getWeatherData(); // Ambil humidity

        return [
            'chart' => [
                'type' => 'radialBar',
                'height' => 350,
                'offsetY' => -10,
            ],
            'series' => [$humidity], // Set nilai humidity sebagai data
            'plotOptions' => [
                'radialBar' => [
                    'startAngle' => -135,
                    'endAngle' => 135,
                    'dataLabels' => [
                        'name' => [
                            'fontSize' => '16px',
                            'offsetY' => 120,
                        ],
                        'value' => [
                            'show' => true,
                            'fontFamily' => 'inherit',
                            'fontWeight' => 600,
                            'fontSize' => '16px',
                        ],
                    ],
                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'shadeIntensity' => 0.15,
                    'inverseColors' => false,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 50, 65, 91],
                ],
            ],
            'stroke' => [
                'dashArray' => 4,
            ],
            'labels' => ['Humidity'],
            'colors' => ['#3498db'], // Warna biru untuk humidity
        ];
    }
}
