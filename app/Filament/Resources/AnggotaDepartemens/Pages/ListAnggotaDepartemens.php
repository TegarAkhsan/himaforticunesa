<?php

namespace App\Filament\Resources\AnggotaDepartemens\Pages;

use App\Filament\Resources\AnggotaDepartemens\AnggotaDepartemenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnggotaDepartemens extends ListRecords
{
    protected static string $resource = AnggotaDepartemenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
