<?php

namespace App\Filament\Resources\PublicQuestions;

use App\Filament\Resources\PublicQuestions\Pages\CreatePublicQuestion;
use App\Filament\Resources\PublicQuestions\Pages\EditPublicQuestion;
use App\Filament\Resources\PublicQuestions\Pages\ListPublicQuestions;
use App\Filament\Resources\PublicQuestions\Pages;
use App\Models\PublicQuestion;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;

class PublicQuestionResource extends Resource
{
    protected static ?string $model = PublicQuestion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $recordTitleAttribute = 'question';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('asker_name')
                    ->label('Asker Name (Optional)')
                    ->maxLength(255),
                Textarea::make('question')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('answer')
                    ->label('Admin Answer')
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->label('Publish to Homepage')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asker_name')
                    ->label('Asker')
                    ->searchable()
                    ->placeholder('Anonymous'),
                Tables\Columns\TextColumn::make('question')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
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
            'index' => ListPublicQuestions::route('/'),
            'create' => CreatePublicQuestion::route('/create'),
            'edit' => EditPublicQuestion::route('/{record}/edit'),
        ];
    }
}
