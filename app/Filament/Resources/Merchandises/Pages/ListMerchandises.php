<?php

namespace App\Filament\Resources\Merchandises\Pages;

use App\Filament\Resources\Merchandises\MerchandiseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMerchandises extends ListRecords
{
    protected static string $resource = MerchandiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
