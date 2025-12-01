<?php

namespace App\Filament\Resources\PrestasiAnggotas\Pages;

use App\Filament\Resources\PrestasiAnggotas\PrestasiAnggotaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPrestasiAnggota extends EditRecord
{
    protected static string $resource = PrestasiAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
