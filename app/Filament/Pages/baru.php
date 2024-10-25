<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class baru extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $navigationGroup = 'Main Menu';
    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.baru';
}
