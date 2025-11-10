<?php

namespace App\Filament\Resources\Files\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('path')
                ->label('File')
                ->disk('public') // simpan di storage/app/public
                ->directory('uploads/files') // folder penyimpanan
                ->preserveFilenames() // pakai nama asli file
                ->maxSize(10240) // maksimal 10MB
                ->required()
                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                    return $file->getClientOriginalName(); // nama file asli
                }),

            TextInput::make('nama_file')
                ->label('Nama File')
                ->required(),

            TextInput::make('tipe')
                ->label('Tipe File')
                ->disabled(),

            TextInput::make('ukuran')
                ->label('Ukuran (bytes)')
                ->disabled(),
        ]);
    }
}
