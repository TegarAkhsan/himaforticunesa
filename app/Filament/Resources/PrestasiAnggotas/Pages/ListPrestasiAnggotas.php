<?php

namespace App\Filament\Resources\PrestasiAnggotas\Pages;

use App\Filament\Resources\PrestasiAnggotas\PrestasiAnggotaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPrestasiAnggotas extends ListRecords
{
    protected static string $resource = PrestasiAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
