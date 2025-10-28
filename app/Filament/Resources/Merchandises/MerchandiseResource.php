<?php

namespace App\Filament\Resources\Merchandises;

use App\Filament\Resources\Merchandises\Pages\CreateMerchandise;
use App\Filament\Resources\Merchandises\Pages\EditMerchandise;
use App\Filament\Resources\Merchandises\Pages\ListMerchandises;
use App\Filament\Resources\Merchandises\Schemas\MerchandiseForm;
use App\Filament\Resources\Merchandises\Tables\MerchandisesTable;
use App\Models\Merchandise;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MerchandiseResource extends Resource
{
    protected static ?string $model = Merchandise::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Merchandise';
    protected static ?string $pluralModelLabel = 'Merchandise';
    protected static ?string $modelLabel = 'Merchandise';

    protected static ?string $recordTitleAttribute = 'Merchandise';

    public static function form(Schema $schema): Schema
    {
        return MerchandiseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MerchandisesTable::configure($table);
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
            'index' => ListMerchandises::route('/'),
            'create' => CreateMerchandise::route('/create'),
            'edit' => EditMerchandise::route('/{record}/edit'),
        ];
    }
}
