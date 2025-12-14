<?php

namespace App\Filament\Resources\Himafortics\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class HimaforticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tahun_periode')
                    ->label('Tahun Periode')
                    ->required()
                    ->placeholder('Contoh: 2024/2025'),

                FileUpload::make('foto')
                    ->label('Foto Periode')
                    ->image()
                    ->directory('himafortic') // simpan di storage/app/public/himafortic
                    ->disk('public')
                    ->preserveFilenames(),

                RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->default(null)
                    ->columnSpanFull(),

                Select::make('ketua_id')
                    ->label('Ketua Himpunan')
                    ->relationship('ketua', 'nama') // relasi ke model Mahasiswa
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('wakil_id')
                    ->label('Wakil Ketua Himpunan')
                    ->relationship('wakil', 'nama') // relasi ke model Mahasiswa
                    ->searchable()
                    ->preload()
                    ->required(),

                Toggle::make('is_active')
                    ->label('Set as Active Period')
                    ->helperText('Only one period should be active at a time.')
                    ->default(false),

                \Filament\Forms\Components\Repeater::make('galleries')
                    ->relationship()
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Gallery Image')
                            ->image()
                            ->directory('himafortic-gallery')
                            ->disk('public')
                            ->required(),
                        TextInput::make('caption')
                            ->label('Caption (Optional)')
                            ->placeholder('Moment description...'),
                    ])
                    ->label('Our Gallery')
                    ->columnSpanFull()
                    ->reorderableWithButtons()
                    ->collapsible()
                    ->itemLabel(fn(array $state): ?string => $state['caption'] ?? null),
            ]);
    }
}
