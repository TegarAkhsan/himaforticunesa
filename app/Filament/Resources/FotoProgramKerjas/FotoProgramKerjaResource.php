<?php

namespace App\Filament\Resources\FotoProgramKerjas;

use App\Filament\Resources\FotoProgramKerjas\Pages\CreateFotoProgramKerja;
use App\Filament\Resources\FotoProgramKerjas\Pages\EditFotoProgramKerja;
use App\Filament\Resources\FotoProgramKerjas\Pages\ListFotoProgramKerjas;
use App\Filament\Resources\FotoProgramKerjas\Schemas\FotoProgramKerjaForm;
use App\Filament\Resources\FotoProgramKerjas\Tables\FotoProgramKerjasTable;
use App\Models\FotoProgramKerja;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;


class FotoProgramKerjaResource extends Resource
{

    protected static ?string $model = FotoProgramKerja::class;


    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Foto Program Kerja';
    protected static ?string $pluralModelLabel = 'Foto Program Kerja';
    protected static ?string $modelLabel = 'Foto Program Kerja';

    protected static ?string $recordTitleAttribute = 'program_kerja_id';


    public static function form(Schema $schema): Schema
    {
        return FotoProgramKerjaForm::configure($schema);
    }


    public static function table(Table $table): Table
    {
        return FotoProgramKerjasTable::configure($table);
    }


    public static function getRelations(): array
    {
        return [];
    }


    public static function getPages(): array
    {
        return [
            'index' => ListFotoProgramKerjas::route('/'),
            'create' => CreateFotoProgramKerja::route('/create'),
            'edit' => EditFotoProgramKerja::route('/{record}/edit'),
        ];
    }
}
