<?php

namespace App\Filament\Resources\PengurusHimpunans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class PengurusHimpunansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->square()
                    ->height(60)
                    ->width(60)
                    ->disk('public'),

                TextColumn::make('mahasiswa.nama')
                    ->label('Nama Mahasiswa')
                    ->searchable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->badge(),

                TextColumn::make('departemen.nama')
                    ->label('Departemen')
                    ->default('-'),

                TextColumn::make('mahasiswa.instagram')
                    ->label('Instagram')
                    ->url(fn ($record) => $record->mahasiswa->instagram 
                        ? (str_starts_with($record->mahasiswa->instagram, 'http') 
                            ? $record->mahasiswa->instagram 
                            : 'https://instagram.com/' . ltrim($record->mahasiswa->instagram, '@')
                        ) 
                        : null)
                    ->openUrlInNewTab()
                    ->color('info')
                    ->icon('heroicon-o-link'),

                TextColumn::make('mahasiswa.linkedin')
                    ->label('LinkedIn')
                    ->url(fn ($record) => $record->mahasiswa->linkedin)
                    ->openUrlInNewTab()
                    ->color('info')
                    ->icon('heroicon-o-globe-alt'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([])
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
