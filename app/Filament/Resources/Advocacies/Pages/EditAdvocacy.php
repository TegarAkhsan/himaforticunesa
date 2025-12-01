<?php

namespace App\Filament\Resources\Advocacies\Pages;

use App\Filament\Resources\Advocacies\AdvocacyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdvocacy extends EditRecord
{
    protected static string $resource = AdvocacyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
