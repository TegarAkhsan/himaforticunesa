<?php

namespace App\Filament\Resources\Himafortics\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class HimaforticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tahun_periode')
                    ->label('Tahun Periode')
                    ->required()
                    ->placeholder('Contoh: 2024/2025'),

                FileUpload::make('foto')
                ->label('Foto Periode')
                ->image()
                ->directory('himafortic') // simpan di storage/app/public/himafortic
                ->disk('public')
                ->preserveFilenames(),

                RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->default(null)
                    ->columnSpanFull(),

                Select::make('ketua_id')
                    ->label('Ketua Himpunan')
                    ->relationship('ketua', 'nama') // relasi ke model Mahasiswa
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('wakil_id')
                    ->label('Wakil Ketua Himpunan')
                    ->relationship('wakil', 'nama') // relasi ke model Mahasiswa
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
