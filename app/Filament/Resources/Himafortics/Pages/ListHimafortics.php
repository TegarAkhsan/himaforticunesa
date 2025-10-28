<?php

namespace App\Filament\Resources\Himafortics\Pages;

use App\Filament\Resources\Himafortics\HimaforticResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHimafortics extends ListRecords
{
    protected static string $resource = HimaforticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
