<?php

namespace App\Filament\Resources\KategoriMerchandises;

use App\Filament\Resources\KategoriMerchandises\Pages\CreateKategoriMerchandise;
use App\Filament\Resources\KategoriMerchandises\Pages\EditKategoriMerchandise;
use App\Filament\Resources\KategoriMerchandises\Pages\ListKategoriMerchandises;
use App\Filament\Resources\KategoriMerchandises\Schemas\KategoriMerchandiseForm;
use App\Filament\Resources\KategoriMerchandises\Tables\KategoriMerchandisesTable;
use App\Models\KategoriMerchandise;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KategoriMerchandiseResource extends Resource
{
    protected static ?string $model = KategoriMerchandise::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Kategori Merchandise';
    protected static ?string $pluralModelLabel = 'Kategori Merchandise';
    protected static ?string $modelLabel = 'Kategori Merchandise';

    protected static ?string $recordTitleAttribute = 'KategoriMerchandise';

    public static function form(Schema $schema): Schema
    {
        return KategoriMerchandiseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KategoriMerchandisesTable::configure($table);
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
            'index' => ListKategoriMerchandises::route('/'),
            'create' => CreateKategoriMerchandise::route('/create'),
            'edit' => EditKategoriMerchandise::route('/{record}/edit'),
        ];
    }
}
