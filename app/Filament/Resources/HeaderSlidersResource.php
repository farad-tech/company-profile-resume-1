<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeaderSlidersResource\Pages;
use App\Models\HeaderSliders;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeaderSlidersResource extends Resource
{
    use Translatable;
    protected static ?string $model = HeaderSliders::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('icon')
                    ->label('Slider icon')
                    ->required(),

                TextInput::make('title')
                    ->label('Slider text')
                    ->required(),

                TextInput::make('CallToActionTitle')
                    ->label('Slider call to action title')
                    ->required(),

                TextInput::make('CallToActionURL')
                    ->label('Slider call to action URL')
                    ->activeUrl()
                    ->required(),

                FileUpload::make('image')
                    ->label('Slider image')
                    ->image()
                    ->downloadable()
                    ->imageEditor()
                    ->directory('slider')
                    ->required(),

                TextInput::make('imageAlt')
                    ->label('Slider image alternative text')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('CallToActionTitle'),
                TextColumn::make('CallToActionURL'),
                TextColumn::make('imageAlt'),
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
            'index' => Pages\ListHeaderSliders::route('/'),
            'create' => Pages\CreateHeaderSliders::route('/create'),
            'edit' => Pages\EditHeaderSliders::route('/{record}/edit'),
        ];
    }
}
