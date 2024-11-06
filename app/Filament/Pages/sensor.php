<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class sensor extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Sensor';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.sensor';
}
