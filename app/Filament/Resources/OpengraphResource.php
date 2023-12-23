<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpengraphResource\Pages;
use App\Filament\Resources\OpengraphResource\RelationManagers;
use App\Models\Opengraph;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OpengraphResource extends Resource
{
    use Translatable;
    protected static ?string $model = Opengraph::class;

    protected static ?string $navigationGroup = 'Setting';

    protected static $pages = [
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
                        Select::make('og_type')
                            ->label('Open graph Type')
                            ->options([
                                'article' => 'Article',
                                'business.business' => 'Business',
                                'product.group' => 'Product group',
                                'website' => 'Website',
                            ])->required()->disabled(function (string $operation) {
                                return ($operation == 'edit') ? true : false;
                            }),

                        Select::make('page')
                            ->label('Page')
                            ->options(
                                function (string $operation) {
                                    if($operation == 'create') {
                                        foreach (self::$pages as $key => $value) {
                                            if (Opengraph::where('page', $key)->get()->first() !== null) {
                                                unset(self::$pages[$key]);
                                            }
                                        }
                                    }
                                    return self::$pages;
                                }
                            )
                            ->required()->disabled(function (string $operation) {
                                return ($operation == 'edit') ? true : false;
                            }),

                        TextInput::make('og_title')
                            ->label('Open graph title')
                            ->required()
                            ->hint('Translatable!')
                            ->hintColor('info'),

                        TextInput::make('og_site_name')
                            ->label("Open graph site name")
                            ->required()
                            ->hint('Translatable!')
                            ->hintColor('info'),

                        TextInput::make('og_url')
                            ->label("Open graph URL")
                            ->required()
                            ->hint('Translatable!')
                            ->hintColor('info'),

                        Textarea::make('og_description')
                            ->label("Open graph description")
                            ->rows(3)
                            ->required()
                            ->hint('Translatable!')
                            ->hintColor('info'),

                        FileUpload::make('og_image')
                            ->label("Open graph image")
                            ->image()
                            ->downloadable()
                            ->imageEditor()
                            ->directory('project-categories')
                            ->required(),

                    ])->columnSpan([
                        'md' => 2
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListOpengraphs::route('/'),
            'create' => Pages\CreateOpengraph::route('/create'),
            'edit' => Pages\EditOpengraph::route('/{record}/edit'),
        ];
    }
}
