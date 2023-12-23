<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchemaResource\Pages;
use App\Filament\Resources\SchemaResource\RelationManagers;
use App\Models\Schema;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
use Illuminate\Support\HtmlString;

class SchemaResource extends Resource
{
    use Translatable;
    protected static ?string $model = Schema::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static $pages = [
        'home' => 'Home',
        'about-us' => 'About us',
        'articles' => 'Blog',
        'projects' => 'Projects',
        'services' => 'Services',
        'teams' => 'Teams',
        'testimonials' => 'Testimonials',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('page')
                            ->options(function (string $operation) {
                                if($operation == 'create') {
                                    foreach (self::$pages as $key => $value) {
                                        if (Schema::where('page', $key)->get()->first() !== null) {
                                            unset(self::$pages[$key]);
                                        }
                                    }
                                }
                                return self::$pages;
                            })->required()->disabled(function (string $operation) {
                                return ($operation == 'edit') ? true : false;
                            }),

                        Textarea::make('schema')
                            ->required()
                            ->rows(6)
                            ->hint(function () {
                                return new HtmlString('<a style="text-decoration: underline;" href="https://www.rankranger.com/schema-markup-generator">Schema online generator.</a>');
                            })
                            ->hintcolor('info'),

                        Toggle::make('enabled'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page'),
                ToggleColumn::make('enabled'),
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
            'index' => Pages\ListSchemas::route('/'),
            'create' => Pages\CreateSchema::route('/create'),
            'edit' => Pages\EditSchema::route('/{record}/edit'),
        ];
    }    
}
