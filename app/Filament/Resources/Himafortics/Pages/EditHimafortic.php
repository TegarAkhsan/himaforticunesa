<?php

namespace App\Filament\Resources\Himafortics\Pages;

use App\Filament\Resources\Himafortics\HimaforticResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHimafortic extends EditRecord
{
    protected static string $resource = HimaforticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
