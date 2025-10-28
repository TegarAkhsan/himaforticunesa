<?php

namespace App\Filament\Resources\ProgramKerjas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\Departemen;
use Filament\Forms\Components\RichEditor;


class ProgramKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Select::make('departemen_id')
                ->label('Departemen')
                ->options(Departemen::pluck('nama', 'id')) 
                ->searchable()
                ->required(),

            TextInput::make('nama')
                ->label('Nama Program Kerja')
                ->required(),

            RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->default(null)
                    ->columnSpanFull(),
            DatePicker::make('tanggal_mulai')
                ->label('Tanggal Mulai')
                ->required(),

            DatePicker::make('tanggal_selesai')
                ->label('Tanggal Selesai')
                ->required(),
        ]);
    }
}
