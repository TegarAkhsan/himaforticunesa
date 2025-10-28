<?php

namespace App\Filament\Resources\Himafortics\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class HimaforticsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun_periode')
                    ->label('Periode')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('foto')
                    ->label('Foto Periode')
                    ->disk('public')
                    ->height(60)
                    ->width(60)
                    ->square()
                    ->toggleable(),

                // 🔹 Kolom Ketua Himpunan
                TextColumn::make('ketua.nama')
                    ->label('Ketua Himpunan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ketua.nim')
                    ->label('NIM Ketua')
                    ->toggleable(),

                // 🔹 Kolom Wakil Himpunan
                TextColumn::make('wakil.nama')
                    ->label('Wakil Himpunan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('wakil.nim')
                    ->label('NIM Wakil')
                    ->toggleable(),
                // 🔹 Deskripsi (dibuat agar teks turun ke bawah, bukan melebar)
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->wrap() // teks otomatis turun ke bawah
                    ->limit(50) // tampilkan maksimal 100 karakter (klik untuk detail)
                    ->tooltip(fn ($record) => $record->deskripsi) // tooltip menampilkan teks lengkap saat hover
                    ->extraAttributes(['class' => 'whitespace-normal break-words text-sm text-slate-700']),

                ImageColumn::make('ketua.foto')
                    ->label('Foto Ketua')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->square(),

                ImageColumn::make('wakil.foto')
                    ->label('Foto Wakil')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->square(),

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
