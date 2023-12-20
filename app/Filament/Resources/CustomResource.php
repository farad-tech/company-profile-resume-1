<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomResource\Pages;
use App\Models\Custom;
use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomResource extends Resource
{
  use Translatable;
  protected static ?string $model = Custom::class;

  protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

  protected static $options = [
    'about' => 'About us content',
    'contact' => 'Contact us content',
  ];

  public static function form(Form $form): Form
  {

    return $form
      ->schema([
        Section::make('Select content type')
          ->schema([
            Select::make('title')
              ->options(function (string $operation) {
                $custom = new Custom;

                if ($operation == 'create') {
                  foreach (self::$options as $optionkey => $optionValue) {
                    if ($custom->where('title', $optionkey)->first() !== null) {
                      unset(self::$options[$optionkey]);
                    }
                  }
                }

                return self::$options;
              })
              ->live()
              ->afterStateUpdated(
                fn ($state, callable $set) => $state ? $set('about', null) : $set('about', 'hidden')
              )
              ->hint(
                function (string $operation) {
                  $custom = new Custom;

                  if ($operation == 'create') {
                    foreach (self::$options as $optionkey => $optionValue) {
                      if ($custom->where('title', $optionkey)->first() !== null) {
                        unset(self::$options[$optionkey]);
                      }
                    }
                  }

                  return (count(self::$options) <= 0) ? 'You created all type of custom contents.' : '';
                }
              )
              ->hintColor('danger')
          ]),

        // about contenct
        Section::make('about')
          ->statePath('content')
          ->schema([
            Textarea::make('title')->rows(2),
            Textarea::make('sub-title')->rows(2),
            Textarea::make('text-1')->rows(3),
            TagsInput::make('options'),
            Textarea::make('text-2')->rows(3),
            FileUpload::make('image'),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'about'
          ),

        Section::make('contact')
          ->statePath('content')
          ->schema([
            TextInput::make('title')
              ->label('Title'),

            Textarea::make('text')
              ->label('Text'),

            TextInput::make('button-text')
              ->label('Button text'),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'contact'
          ),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title')
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
      'index' => Pages\ListCustoms::route('/'),
      'create' => Pages\CreateCustom::route('/create'),
      'edit' => Pages\EditCustom::route('/{record}/edit'),
    ];
  }
}
