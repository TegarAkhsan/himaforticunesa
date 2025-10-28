<?php

namespace App\Filament\Resources\AnggotaDepartemens\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class AnggotaDepartemenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('mahasiswa_id')
                ->label('Mahasiswa')
                ->options(\App\Models\Mahasiswa::pluck('nama', 'id'))
                ->searchable()
                ->required(),

            Select::make('departemen_id')
                ->label('Departemen')
                ->options(\App\Models\Departemen::pluck('nama', 'id'))
                ->searchable()
                ->required(),
            Select::make('jabatan')
                ->label('Jabatan')
                ->options([
                    'Ketua Departemen' => 'Ketua',
                    'Staff' => 'Staff',
                ])
                ->required(),
        ]);
    }
}
