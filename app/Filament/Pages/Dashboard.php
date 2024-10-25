<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as FilamentDashboard;
use Filament\Widgets;

class Dashboard extends FilamentDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\Grid::make(2) // Grid dengan 2 kolom
                ->schema([
                    \App\Filament\Widgets\UserChart::class
                    ->columnSpan(1),  // Widget Chart User (kiri)
                    \App\Filament\Widgets\PieChart::class
                    ->columnSpan(2),   // Widget PieChart (kanan)
                ]),
        ];
    }
}
