<?php

namespace App\Filament\Resources\Advocacies\Pages;

use App\Filament\Resources\Advocacies\AdvocacyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdvocacies extends ListRecords
{
    protected static string $resource = AdvocacyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
