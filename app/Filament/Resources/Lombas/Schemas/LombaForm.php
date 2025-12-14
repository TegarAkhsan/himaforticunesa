<?php

namespace App\Filament\Resources\Lombas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

use Filament\Forms\Components\FileUpload;

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
                Select::make('jenis')
                    ->options([
                        'Kompetisi' => 'Kompetisi',
                        'Pelatihan' => 'Pelatihan',
                    ])
                    ->required(),
                Select::make('status')
                    ->options([
                        'Open' => 'Open',
                        'Soon' => 'Soon',
                        'Closed' => 'Closed',
                    ])
                    ->required()
                    ->default('Open'),
                TextInput::make('link_pendaftaran'),
                FileUpload::make('gambar')
                    ->image()
                    ->directory('lomba-images'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
