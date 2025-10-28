<?php

namespace App\Filament\Resources\PengurusHimpunans\Pages;

use App\Filament\Resources\PengurusHimpunans\PengurusHimpunanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengurusHimpunan extends EditRecord
{
    protected static string $resource = PengurusHimpunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
