<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select; 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload; // <-- 1. Tambahkan import FileUpload
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('kategori_berita_id')
                    ->relationship('kategori', 'nama') 
                    ->required()
                    ->label('Kategori'),

                TextInput::make('judul')
                    ->required(),
                TextInput::make('slug')
                    ->required(),

                FileUpload::make('gambar_utama')
                    ->label('Gambar Utama') 
                    ->image() 
                    ->directory('berita-images') 
                    ->disk('public') 
                    ->nullable(), 
                RichEditor::make('konten') 
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('penulis')
                    ->nullable(),
            ]);
    }
}