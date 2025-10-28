<?php

namespace App\Filament\Resources\PengurusHimpunans\Pages;

use App\Filament\Resources\PengurusHimpunans\PengurusHimpunanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengurusHimpunans extends ListRecords
{
    protected static string $resource = PengurusHimpunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
