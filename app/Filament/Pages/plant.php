<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Resources\PlantResource\Widgets\HamaPlant;
use App\Filament\Resources\PlantResource\Widgets\Category;
use App\Filament\Resources\PlantResource\Widgets\Pertumbuhan;
use App\Filament\Resources\PlantResource\Widgets\Health;


class plant extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-bug-ant';
    protected static ?string $navigationLabel = 'Plant';
    protected static ?string $navigationGroup = 'Monitoring';
    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.plant';

    protected function getHeaderWidgets(): array
    {
        return [
            HamaPlant::class,
            Category::class,
            Pertumbuhan::class,
            Health::class,
        ];
    }
}
