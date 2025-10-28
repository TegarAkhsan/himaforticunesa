<?php

namespace App\Filament\Resources\Merchandises\Pages;

use App\Filament\Resources\Merchandises\MerchandiseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMerchandise extends EditRecord
{
    protected static string $resource = MerchandiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
