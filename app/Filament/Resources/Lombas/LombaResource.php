<?php

namespace App\Filament\Resources\Lombas;

use App\Filament\Resources\Lombas\Pages\CreateLomba;
use App\Filament\Resources\Lombas\Pages\EditLomba;
use App\Filament\Resources\Lombas\Pages\ListLombas;
use App\Filament\Resources\Lombas\Schemas\LombaForm;
use App\Filament\Resources\Lombas\Tables\LombasTable;
use App\Models\Lomba;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LombaResource extends Resource
{
    protected static ?string $model = Lomba::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return LombaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LombasTable::configure($table);
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
            'index' => ListLombas::route('/'),
            'create' => CreateLomba::route('/create'),
            'edit' => EditLomba::route('/{record}/edit'),
        ];
    }
}
