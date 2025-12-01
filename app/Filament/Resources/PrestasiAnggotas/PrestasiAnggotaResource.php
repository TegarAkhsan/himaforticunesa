<?php

namespace App\Filament\Resources\PrestasiAnggotas;

use App\Filament\Resources\PrestasiAnggotas\Pages\CreatePrestasiAnggota;
use App\Filament\Resources\PrestasiAnggotas\Pages\EditPrestasiAnggota;
use App\Filament\Resources\PrestasiAnggotas\Pages\ListPrestasiAnggotas;
use App\Filament\Resources\PrestasiAnggotas\Schemas\PrestasiAnggotaForm;
use App\Filament\Resources\PrestasiAnggotas\Tables\PrestasiAnggotasTable;
use App\Models\PrestasiAnggota;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PrestasiAnggotaResource extends Resource
{
    protected static ?string $model = PrestasiAnggota::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_mahasiswa';

    public static function form(Schema $schema): Schema
    {
        return PrestasiAnggotaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrestasiAnggotasTable::configure($table);
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
            'index' => ListPrestasiAnggotas::route('/'),
            'create' => CreatePrestasiAnggota::route('/create'),
            'edit' => EditPrestasiAnggota::route('/{record}/edit'),
        ];
    }
}
