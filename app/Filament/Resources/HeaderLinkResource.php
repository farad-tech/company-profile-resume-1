<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeaderLinkResource\Pages;
use App\Filament\Resources\HeaderLinkResource\RelationManagers;
use App\Models\HeaderLink;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeaderLinkResource extends Resource
{
    use Translatable;
    protected static ?string $model = HeaderLink::class;

    protected static ?string $navigationGroup = 'Header';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make() 
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->hint('Translatable')
                            ->hintColor('blue'),
        
                        TextInput::make('url')
                            ->required()
                            ->url(),
        
                        Toggle::make('blank')
                            ->label('Open in blank tab')
                            ->required()
                            ->default(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('url'),
                ToggleColumn::make('blank')->disabled(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListHeaderLinks::route('/'),
            'create' => Pages\CreateHeaderLink::route('/create'),
            'edit' => Pages\EditHeaderLink::route('/{record}/edit'),
        ];
    }
}
