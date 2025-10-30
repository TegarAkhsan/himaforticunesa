<?php

namespace App\Filament\Resources\PengurusHimpunans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use App\Models\Mahasiswa;
use App\Models\Departemen;

class PengurusHimpunanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            // Dropdown untuk memilih mahasiswa
            Select::make('mahasiswa_id')
                ->label('Nama Mahasiswa')
                ->options(Mahasiswa::pluck('nama', 'id')) // ambil data mahasiswa
                ->searchable()
                ->required(),

            // Dropdown jabatan
            Select::make('jabatan')
                ->label('Jabatan')
                ->options([
                    'Ketua Himpunan' => 'Ketua Himpunan',
                    'Wakil Ketua Himpunan' => 'Wakil Ketua Himpunan',
                    'Sekretaris' => 'Sekretaris',
                    'Bendahara' => 'Bendahara',
                    'Ketua Departemen' => 'Ketua Departemen',
                ])
                ->required(),
                
            Select::make('departemen_id')
                ->label('Departemen (jika Ketua Departemen)')
                ->options(Departemen::pluck('nama', 'id')) 
                ->searchable()
                ->visible(fn ($get) => $get('jabatan') === 'Ketua Departemen'),

            FileUpload::make('foto')
                ->label('Foto Pengurus')
                ->image()
                ->disk('public')
                ->directory('pengurus-foto')
                ->imageEditor()
                ->required(),
        ]);
    }
}
