<?php

namespace App\Filament\Resources\PrestasiOrganisasis\Pages;

use App\Filament\Resources\PrestasiOrganisasis\PrestasiOrganisasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPrestasiOrganisasi extends EditRecord
{
    protected static string $resource = PrestasiOrganisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
