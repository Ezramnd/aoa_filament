<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Resources\SprayingResource\Widgets\TankBar;
use App\Filament\Resources\SprayingResource\Widgets\SprayHistoryWidget;

class spraying extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationLabel = 'Spraying';
    protected static ?string $navigationGroup = 'Monitoring';
    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.spraying';

    protected function getHeaderWidgets(): array
    {
        return [
            TankBar::class,
            SprayHistoryWidget::class,
        ];
    }
}
