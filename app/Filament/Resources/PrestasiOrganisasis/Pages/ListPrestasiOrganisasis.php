<?php

namespace App\Filament\Resources\PrestasiOrganisasis\Pages;

use App\Filament\Resources\PrestasiOrganisasis\PrestasiOrganisasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPrestasiOrganisasis extends ListRecords
{
    protected static string $resource = PrestasiOrganisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
