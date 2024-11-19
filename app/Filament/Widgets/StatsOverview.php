<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Device;
use App\Models\SprayHistory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalUsers = User::count(); // Menghitung jumlah total pengguna
        $totalDevice = Device::count();
        $totalSprayHistory = SprayHistory::count();

        return [
            Stat::make('Total Users', $totalUsers)
                ->description('Current user count')
                ->descriptionIcon('heroicon-o-user-group'),
            Stat::make('Total Device', $totalDevice)
                ->description('Current device count')
                ->descriptionIcon('heroicon-o-device-phone-mobile'),
            Stat::make('Total Spray', $totalSprayHistory)
                ->description('Current spray count')
                ->descriptionIcon('heroicon-o-sparkles'),
        ];
    }
}
