<?php

namespace App\Filament\Resources\PrestasiOrganisasis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PrestasiOrganisasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                DatePicker::make('tanggal'),
                TextInput::make('peringkat'),
                TextInput::make('tingkat'),
                TextInput::make('gambar'),
            ]);
    }
}
