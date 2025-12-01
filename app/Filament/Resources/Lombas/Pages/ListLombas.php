<?php

namespace App\Filament\Resources\Lombas\Pages;

use App\Filament\Resources\Lombas\LombaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLombas extends ListRecords
{
    protected static string $resource = LombaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
