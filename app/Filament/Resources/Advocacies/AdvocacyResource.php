<?php

namespace App\Filament\Resources\Advocacies;

use App\Filament\Resources\Advocacies\Pages\CreateAdvocacy;
use App\Filament\Resources\Advocacies\Pages\EditAdvocacy;
use App\Filament\Resources\Advocacies\Pages\ListAdvocacies;
use App\Filament\Resources\Advocacies\Pages;
use App\Models\Advocacy;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;

class AdvocacyResource extends Resource
{
    protected static ?string $model = Advocacy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldCheck;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull()
                    ->disabled(), // Read-only
                Select::make('status')
                    ->options([
                        'New' => 'New',
                        'Read' => 'Read',
                        'Resolved' => 'Resolved',
                    ])
                    ->required()
                    ->default('New'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('message')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'New' => 'danger',
                        'Read' => 'warning',
                        'Resolved' => 'success',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAdvocacies::route('/'),
            'create' => CreateAdvocacy::route('/create'),
            'edit' => EditAdvocacy::route('/{record}/edit'),
        ];
    }
}
