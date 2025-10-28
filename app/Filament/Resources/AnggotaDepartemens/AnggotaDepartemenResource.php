<?php

namespace App\Filament\Resources\AnggotaDepartemens;

use App\Filament\Resources\AnggotaDepartemens\Pages\CreateAnggotaDepartemen;
use App\Filament\Resources\AnggotaDepartemens\Pages\EditAnggotaDepartemen;
use App\Filament\Resources\AnggotaDepartemens\Pages\ListAnggotaDepartemens;
use App\Filament\Resources\AnggotaDepartemens\Schemas\AnggotaDepartemenForm;
use App\Filament\Resources\AnggotaDepartemens\Tables\AnggotaDepartemensTable;
use App\Models\AnggotaDepartemen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AnggotaDepartemenResource extends Resource
{
    protected static ?string $model = AnggotaDepartemen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Anggota Departemen';
    protected static ?string $pluralModelLabel = 'Anggota Departemen';
    protected static ?string $modelLabel = 'Anggota Departemen';

    protected static ?string $recordTitleAttribute = 'AnggotaDepartemen';

    public static function form(Schema $schema): Schema
    {
        return AnggotaDepartemenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnggotaDepartemensTable::configure($table);
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
            'index' => ListAnggotaDepartemens::route('/'),
            'create' => CreateAnggotaDepartemen::route('/create'),
            'edit' => EditAnggotaDepartemen::route('/{record}/edit'),
        ];
    }
}
