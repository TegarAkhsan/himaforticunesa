<?php

namespace App\Filament\Resources\PublicQuestions\Pages;

use App\Filament\Resources\PublicQuestions\PublicQuestionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPublicQuestions extends ListRecords
{
    protected static string $resource = PublicQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
