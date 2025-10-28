<?php

namespace App\Filament\Resources\KategoriMerchandises\Pages;

use App\Filament\Resources\KategoriMerchandises\KategoriMerchandiseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKategoriMerchandises extends ListRecords
{
    protected static string $resource = KategoriMerchandiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
