<?php

namespace App\Filament\Resources\Lombas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LombaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                DatePicker::make('tanggal'),
                TextInput::make('lokasi'),
                TextInput::make('jenis')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('Open'),
                TextInput::make('link_pendaftaran'),
                TextInput::make('gambar'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
