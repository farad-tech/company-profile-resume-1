<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeaderInfoResource\Pages;
use App\Models\HeaderInfo;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeaderInfoResource extends Resource
{
    use Translatable;
    protected static ?string $model = HeaderInfo::class;

    // protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'Header';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('details')
                    ->schema([
                        TextInput::make("title")
                        ->required(),
                        TextInput::make('value')
                        ->required(),
                        FileUpload::make('icon')
                        ->image()
                        ->downloadable()
                        ->imageEditor()
                        ->directory('icons')
                        ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('value'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListHeaderInfos::route('/'),
            'create' => Pages\CreateHeaderInfo::route('/create'),
            'edit' => Pages\EditHeaderInfo::route('/{record}/edit'),
        ];
    }
}
