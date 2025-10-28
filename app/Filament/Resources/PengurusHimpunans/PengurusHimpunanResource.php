<?php

namespace App\Filament\Resources\PengurusHimpunans;

use App\Filament\Resources\PengurusHimpunans\Pages\CreatePengurusHimpunan;
use App\Filament\Resources\PengurusHimpunans\Pages\EditPengurusHimpunan;
use App\Filament\Resources\PengurusHimpunans\Pages\ListPengurusHimpunans;
use App\Filament\Resources\PengurusHimpunans\Schemas\PengurusHimpunanForm;
use App\Filament\Resources\PengurusHimpunans\Tables\PengurusHimpunansTable;
use App\Models\PengurusHimpunan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengurusHimpunanResource extends Resource
{
    protected static ?string $model = PengurusHimpunan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PengurusHimpunan';

    public static function form(Schema $schema): Schema
    {
        return PengurusHimpunanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengurusHimpunansTable::configure($table);
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
            'index' => ListPengurusHimpunans::route('/'),
            'create' => CreatePengurusHimpunan::route('/create'),
            'edit' => EditPengurusHimpunan::route('/{record}/edit'),
        ];
    }
}
