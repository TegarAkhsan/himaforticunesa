<?php

namespace App\Filament\Resources\PublicQuestions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PublicQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('question')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('answer')
                    ->columnSpanFull(),
                TextInput::make('asker_name'),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
