<?php

namespace App\Filament\Resources\ContactPeople\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactPersonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('category')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('whatsapp_number')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
