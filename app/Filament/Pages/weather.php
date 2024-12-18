<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Resources\WeatherResource\Widgets\GaugeChart11;
use App\Filament\Resources\WeatherResource\Widgets\WeatherWidget;

class weather extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cloud';
    protected static ?string $navigationLabel = 'Weather';
    protected static ?string $navigationGroup = 'Monitoring';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.weather';

    protected function getHeaderWidgets(): array
    {
        return [
            WeatherWidget::class, // Tambahkan widget Anda di sini
            GaugeChart11::class,
        ];
    }
}
