<?php

namespace App\Filament\Resources\PrestasiOrganisasis;

use App\Filament\Resources\PrestasiOrganisasis\Pages\CreatePrestasiOrganisasi;
use App\Filament\Resources\PrestasiOrganisasis\Pages\EditPrestasiOrganisasi;
use App\Filament\Resources\PrestasiOrganisasis\Pages\ListPrestasiOrganisasis;
use App\Filament\Resources\PrestasiOrganisasis\Schemas\PrestasiOrganisasiForm;
use App\Filament\Resources\PrestasiOrganisasis\Tables\PrestasiOrganisasisTable;
use App\Models\PrestasiOrganisasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PrestasiOrganisasiResource extends Resource
{
    protected static ?string $model = PrestasiOrganisasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return PrestasiOrganisasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrestasiOrganisasisTable::configure($table);
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
            'index' => ListPrestasiOrganisasis::route('/'),
            'create' => CreatePrestasiOrganisasi::route('/create'),
            'edit' => EditPrestasiOrganisasi::route('/{record}/edit'),
        ];
    }
}
