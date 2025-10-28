<?php

namespace App\Filament\Resources\Himafortics;

use App\Filament\Resources\Himafortics\Pages\CreateHimafortic;
use App\Filament\Resources\Himafortics\Pages\EditHimafortic;
use App\Filament\Resources\Himafortics\Pages\ListHimafortics;
use App\Filament\Resources\Himafortics\Schemas\HimaforticForm;
use App\Filament\Resources\Himafortics\Tables\HimaforticsTable;
use App\Models\Himafortic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HimaforticResource extends Resource
{
    protected static ?string $model = Himafortic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Himafortic';

    public static function form(Schema $schema): Schema
    {
        return HimaforticForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HimaforticsTable::configure($table);
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
            'index' => ListHimafortics::route('/'),
            'create' => CreateHimafortic::route('/create'),
            'edit' => EditHimafortic::route('/{record}/edit'),
        ];
    }
}
