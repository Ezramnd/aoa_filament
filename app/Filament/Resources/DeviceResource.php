<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Device;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DeviceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DeviceResource\RelationManagers;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->label('Device Name')
                ->required(),
            
            TextInput::make('type')
                ->label('Device Type')
                ->required(),

            TextInput::make('serial_number')
                ->label('Serial Number')
                ->required(),           

            Select::make('status')
                ->label('Status')
                ->options([
                    1 => 'Active',    // Integer value for active
                    0 => 'Inactive',  // Integer value for inactive
                ])
                ->required(),
                
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Device Name'),
                Tables\Columns\TextColumn::make('type')->label('Type'),
                Tables\Columns\ToggleColumn::make('status')
                ->label('Status')
                ->onColor('success') // Warna jika aktif
                ->offColor('danger') // Warna jika non-aktif
                ->sortable()
                ->toggleable(), // Mengaktifkan toggle langsung di tabel
                Tables\Columns\TextColumn::make('active_duration')
                ->label('Active Duration')
                ->formatStateUsing(function ($record) {
                    // Pastikan menggunakan Carbon untuk menghitung durasi
                    if ($record->status && $record->active_start) {
                        $end = $record->active_end ?? now();
                        $duration = $record->active_start->diff($end);
                        return $duration->format('%H:%I:%S');
                    }
                    return '00:00:00';
                })
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'view' => Pages\ViewDevice::route('/{record}'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
