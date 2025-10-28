<?php

namespace App\Filament\Resources\FotoProgramKerjas\Pages;

use App\Filament\Resources\FotoProgramKerjas\FotoProgramKerjaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFotoProgramKerjas extends ListRecords
{
    protected static string $resource = FotoProgramKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
