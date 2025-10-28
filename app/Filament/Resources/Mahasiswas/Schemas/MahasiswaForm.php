<?php

namespace App\Filament\Resources\Mahasiswas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class MahasiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->label('Nama Mahasiswa'),

                TextInput::make('nim')
                    ->required()
                    ->label('NIM'),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->label('Email'),

                TextInput::make('no_hp')
                    ->label('Nomor HP'),

                // ✅ Ganti dari TextInput ke FileUpload agar bisa upload gambar
                FileUpload::make('foto')
                    ->label('Foto Mahasiswa')
                    ->image()
                    ->disk('public')
                    ->directory('mahasiswa') // folder penyimpanan di storage/app/public/mahasiswa
                    ->preserveFilenames()
                    ->maxSize(2048), // max 2MB

                TextInput::make('instagram')
                    ->label('Instagram')
                    ->placeholder('@username atau link profil')
                    ->prefixIcon('heroicon-o-link'),

                TextInput::make('linkedin')
                    ->label('LinkedIn')
                    ->placeholder('https://linkedin.com/in/username')
                    ->prefixIcon('heroicon-o-globe-alt'),
            ]);
    }
}
