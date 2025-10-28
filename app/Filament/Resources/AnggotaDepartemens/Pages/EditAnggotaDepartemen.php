<?php

namespace App\Filament\Resources\AnggotaDepartemens\Pages;

use App\Filament\Resources\AnggotaDepartemens\AnggotaDepartemenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAnggotaDepartemen extends EditRecord
{
    protected static string $resource = AnggotaDepartemenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
