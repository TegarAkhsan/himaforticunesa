<?php

namespace App\Filament\Resources\PublicQuestions\Pages;

use App\Filament\Resources\PublicQuestions\PublicQuestionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPublicQuestion extends EditRecord
{
    protected static string $resource = PublicQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
