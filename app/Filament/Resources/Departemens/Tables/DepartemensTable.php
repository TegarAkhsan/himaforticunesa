<?php

namespace App\Filament\Resources\Departemens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Models\Mahasiswa;
use App\Models\AnggotaDepartemen;
use App\Models\ProgramKerja;

class DepartemensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID departemen'),
                TextColumn::make('nama')
                    ->label('Nama Departemen'),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->wrap() // teks otomatis turun ke bawah
                    ->limit(50) // tampilkan maksimal 100 karakter (klik untuk detail)
                    ->tooltip(fn ($record) => $record->deskripsi) // tooltip menampilkan teks lengkap saat hover
                    ->extraAttributes(['class' => 'whitespace-normal break-words text-sm text-slate-700']),
                TextColumn::make('ketua.nama')
                    ->label('Ketua')
                    ->searchable(),
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public'), 
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
