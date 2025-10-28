<?php

namespace App\Filament\Resources\KategoriMerchandises\Pages;

use App\Filament\Resources\KategoriMerchandises\KategoriMerchandiseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKategoriMerchandise extends EditRecord
{
    protected static string $resource = KategoriMerchandiseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
