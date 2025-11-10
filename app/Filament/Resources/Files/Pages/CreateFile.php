<?php

namespace App\Filament\Resources\Files\Pages;

use App\Filament\Resources\Files\FileResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateFile extends CreateRecord
{
    protected static string $resource = FileResource::class;

    /**
     * Mutasi data form sebelum disimpan ke database.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['path'])) {
            $disk = Storage::disk('public');
            $path = $data['path'];

            $data['nama_file'] = basename($path); // nama file asli
            $data['tipe'] = pathinfo($path, PATHINFO_EXTENSION); // ekstensi file
            $data['ukuran'] = $disk->size($path); // ukuran dalam byte
        }

        return $data;
    }
}
