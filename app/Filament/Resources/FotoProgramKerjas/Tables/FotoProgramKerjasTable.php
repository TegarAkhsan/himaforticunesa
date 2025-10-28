<?php

namespace App\Filament\Resources\FotoProgramKerjas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class FotoProgramKerjasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('programKerja.nama')
                    ->label('Program Kerja')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('foto1')
                    ->label('Foto 1')
                    ->disk('public')
                    ->rounded()
                    ->height(50)
                    ->width(50),

                ImageColumn::make('foto2')
                    ->label('Foto 2')
                    ->disk('public')
                    ->rounded()
                    ->height(50)
                    ->width(50),

                ImageColumn::make('foto3')
                    ->label('Foto 3')
                    ->disk('public')
                    ->rounded()
                    ->height(50)
                    ->width(50),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime()
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
