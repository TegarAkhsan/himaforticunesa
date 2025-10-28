<?php

namespace App\Filament\Resources\Departemens;

use App\Filament\Resources\Departemens\Pages\CreateDepartemen;
use App\Filament\Resources\Departemens\Pages\EditDepartemen;
use App\Filament\Resources\Departemens\Pages\ListDepartemens;
use App\Filament\Resources\Departemens\Schemas\DepartemenForm;
use App\Filament\Resources\Departemens\Tables\DepartemensTable;
use App\Models\Departemen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;


class DepartemenResource extends Resource
{
    protected static ?string $model = Departemen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Departemen';
    protected static ?string $pluralModelLabel = 'Departemen';
    protected static ?string $modelLabel = 'Departemen';

    protected static ?string $recordTitleAttribute = 'Departemen';

    public static function form(Schema $schema): Schema
    {
        return DepartemenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DepartemensTable::configure($table);
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
            'index' => ListDepartemens::route('/'),
            'create' => CreateDepartemen::route('/create'),
            'edit' => EditDepartemen::route('/{record}/edit'),
        ];
    }
}

