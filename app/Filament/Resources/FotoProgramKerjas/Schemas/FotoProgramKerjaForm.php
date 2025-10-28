<?php

namespace App\Filament\Resources\FotoProgramKerjas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

class FotoProgramKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('program_kerja_id')
                ->label('Program Kerja')
                ->options(\App\Models\ProgramKerja::pluck('nama', 'id'))
                ->searchable()
                ->required(),

            FileUpload::make('foto1')
                ->label('Foto 1')
                ->image()
                ->disk('public')
                ->directory('foto_program')
                ->required(),

            FileUpload::make('foto2')
                ->label('Foto 2')
                ->image()
                ->disk('public')
                ->directory('foto_program')
                ->nullable(),

            FileUpload::make('foto3')
                ->label('Foto 3')
                ->image()
                ->disk('public')
                ->directory('foto_program')
                ->nullable(),
        ]);
    }
}
