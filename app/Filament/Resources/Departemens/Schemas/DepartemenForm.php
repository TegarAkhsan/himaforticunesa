<?php

namespace App\Filament\Resources\Departemens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;

class DepartemenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nama')
                ->label('Nama Departemen')
                ->required()
                ->maxLength(255),

            RichEditor::make('deskripsi') 
                    ->required()
                    ->columnSpanFull(),
                
            Select::make('ketua_id')
                ->label('Ketua')
                ->options(\App\Models\Mahasiswa::pluck('nama', 'id'))
                ->searchable()
                ->nullable(),

            FileUpload::make('foto')
                ->label('Foto')
                ->disk('public')
                ->directory('departemen')
                ->image(),
        ]);
    }
}
