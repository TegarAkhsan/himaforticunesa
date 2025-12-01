<?php

namespace App\Filament\Resources\PrestasiAnggotas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PrestasiAnggotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_mahasiswa')
                    ->required(),
                TextInput::make('angkatan'),
                TextInput::make('foto_mahasiswa'),
                TextInput::make('peringkat')
                    ->required(),
                TextInput::make('judul_kompetisi')
                    ->required(),
                TextInput::make('penyelenggara'),
                DatePicker::make('tanggal'),
            ]);
    }
}
