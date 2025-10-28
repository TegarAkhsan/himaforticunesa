<?php

namespace App\Filament\Resources\Beritas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn; 
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BeritasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar_utama')
                    ->disk('public') 
                    ->circular() 
                    ->width(50) 
                    ->height(50), 
                TextColumn::make('kategori.nama') 
                    ->sortable(),
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true), 
                TextColumn::make('konten')
                    ->label('Deskripsi')
                    ->wrap() // teks otomatis turun ke bawah
                    ->limit(50) // tampilkan maksimal 100 karakter (klik untuk detail)
                    ->tooltip(fn ($record) => $record->deskripsi) // tooltip menampilkan teks lengkap saat hover
                    ->extraAttributes(['class' => 'whitespace-normal break-words text-sm text-slate-700']),
                    TextColumn::make('penulis')
                    ->searchable(),
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