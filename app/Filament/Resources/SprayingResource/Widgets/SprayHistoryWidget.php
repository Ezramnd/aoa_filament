<?php

namespace App\Filament\Resources\SprayingResource\Widgets;

use App\Models\SprayHistory;
use App\Filament\Exports\SprayExporter;
use Filament\Actions\Exports\Enums\ExportFormat;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;

class SprayHistoryWidget extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        return SprayHistory::query();
    }

    protected function getTableColumns(): array
    {
        return [
            \Filament\Tables\Columns\TextColumn::make('date')->label('Date'),
            \Filament\Tables\Columns\TextColumn::make('category')->label('Category'),
            \Filament\Tables\Columns\TextColumn::make('active_sensor')
            ->label('Active Sensor')
            ->formatStateUsing(fn ($state) => $state === 1 ? 'ON' : 'OFF'), // Ubah status 1/0 menjadi ON/OFF

    ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            ExportAction::make()->exports([
                ExcelExport::make()->withColumns([
                    Column::make('date'),
                    Column::make('category'),
                    Column::make('active_sensor'),
                ]),
            ])
        ];
    }
}
