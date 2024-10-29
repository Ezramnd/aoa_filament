<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\View\View;

class WeatherWidget extends Widget
{
    protected static ?string $heading = 'Weather Update';
    protected static ?int $sort = 1;

    // Mengambil data cuaca dari OpenWeatherMap API
    public function getWeatherData()
    {
        $apiKey = env('OPENWEATHER_API_KEY'); // Ambil API Key dari .env
        $city = 'Bogor'; // Ganti dengan kota pilihan Anda

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric', // Untuk Celcius
        ]);

        return $response->json();
    }

    // Render tampilan widget dengan data cuaca
    public function render(): View
    {
        $weather = $this->getWeatherData();

        return view('filament.widgets.weather', [
            'city' => $weather['name'],
            'temp' => $weather['main']['temp'],
            'humidity' => $weather['main']['humidity'],
            'desc' => $weather['weather'][0]['description'],
            'icon' => $weather['weather'][0]['icon'],
        ]);
    }
}