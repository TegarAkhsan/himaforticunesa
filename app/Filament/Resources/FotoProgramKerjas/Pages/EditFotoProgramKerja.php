<?php

namespace App\Filament\Resources\FotoProgramKerjas\Pages;

use App\Filament\Resources\FotoProgramKerjas\FotoProgramKerjaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditFotoProgramKerja extends EditRecord
{
    protected static string $resource = FotoProgramKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
