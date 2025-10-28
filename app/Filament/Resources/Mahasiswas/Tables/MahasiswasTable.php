<?php

namespace App\Filament\Resources\Mahasiswas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class MahasiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('no_hp')
                    ->label('No. HP')
                    ->searchable(),

                // ✅ Ganti dari TextColumn menjadi ImageColumn
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->square() // biar tampak rapi
                    ->height(60)
                    ->width(60)
                    ->disk('public') // ambil dari storage/app/public
                    ->visibility('public')
                    ->toggleable(),

                TextColumn::make('instagram')
                    ->label('Instagram')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('linkedin')
                    ->label('LinkedIn')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
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
