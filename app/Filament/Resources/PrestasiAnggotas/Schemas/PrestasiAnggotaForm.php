<?php

namespace App\Filament\Resources\PrestasiAnggotas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PrestasiAnggotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TagsInput::make('nama_mahasiswa')
                    ->separator(',')
                    ->splitKeys(['Tab', ','])
                    ->required(),
                TextInput::make('angkatan'),
                FileUpload::make('foto_mahasiswa')
                    ->image()
                    ->directory('prestasi_mahasiswa')
                    ->label('foto')
                    ->disk('public'),
                TextInput::make('peringkat')
                    ->required(),
                TextInput::make('judul_kompetisi')
                    ->required(),
                TextInput::make('penyelenggara'),
                DatePicker::make('tanggal'),
            ]);
    }
}
