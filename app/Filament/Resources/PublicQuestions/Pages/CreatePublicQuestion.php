<?php

namespace App\Filament\Resources\PublicQuestions\Pages;

use App\Filament\Resources\PublicQuestions\PublicQuestionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePublicQuestion extends CreateRecord
{
    protected static string $resource = PublicQuestionResource::class;
}
