<?php

namespace App\Filament\Resources\Merchandises\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use App\Models\KategoriMerchandise;

class MerchandiseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(
                        KategoriMerchandise::pluck('nama', 'id')->toArray()
                    )
                    ->searchable()
                    ->required(),

                TextInput::make('nama')
                    ->label('Nama Merchandise')
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->default(null)
                    ->columnSpanFull(),

                TextInput::make('harga')
                    ->label('Harga')
                    ->required()
                    ->prefix('Rp')
                    ->mask(RawJs::make('$money($input, \'.\')'))
                    ->dehydrateStateUsing(

                        fn (?string $state): ?string => $state ? str_replace(['.', ','], '', $state) : null
                    )
                    ->formatStateUsing(
                        fn (?string $state): ?string => $state ? number_format($state, 0, ',', '.') : null
                    ),

                TextInput::make('stok')
                    ->label('Stok')
                    ->numeric()
                    ->default(0)
                    ->required(),

                FileUpload::make('gambar')
                    ->label('Upload Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('merchandise')
                    ->maxSize(2048)
                    ->required(),
            ]);
    }
}


 