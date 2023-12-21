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
    'footer-text' => 'Footer text',
    'newsletter' => 'Newsletter',
    'footer-contact' => 'Footer contact ways',
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
              ->disabled(function (string $operation) {
                return ($operation == 'edit') ? true : false;
              })
          ]),

        // about contenct
        Section::make('about')
          ->statePath('content')
          ->schema([
            Textarea::make('title')->rows(2)
              ->hint("Translatable!")
              ->hintColor("info"),

            Textarea::make('sub-title')->rows(2)
              ->hint("Translatable!")
              ->hintColor("info"),

            Textarea::make('text-1')->rows(3)
              ->hint("Translatable!")
              ->hintColor("info"),

            TagsInput::make('options')
              ->hint("Translatable!")
              ->hintColor("info"),

            Textarea::make('text-2')->rows(3)
              ->hint("Translatable!")
              ->hintColor("info"),

            FileUpload::make('image')
              ->hint("Translatable!")
              ->hintColor("info"),

          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'about'
          ),

        Section::make('contact')
          ->statePath('content')
          ->schema([
            TextInput::make('title')
              ->label('Title')
              ->hint("Translatable!")
              ->hintColor("info"),

            Textarea::make('text')
              ->label('Text')
              ->hint("Translatable!")
              ->hintColor("info"),

            TextInput::make('button-text')
              ->label('Button text')
              ->hint("Translatable!")
              ->hintColor("info"),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'contact'
          ),


        Section::make('footer-text')
          ->statePath('content')
          ->schema([
            Textarea::make('text')
              ->label('Title')
              ->hint("Translatable!")
              ->hintColor("info")
              ->rows(3),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'footer-text'
          ),

        Section::make('newsletter')
          ->statePath('content')
          ->schema([
            TextInput::make('text')
              ->label('Title')
              ->hint("Translatable!")
              ->hintColor("info")
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'newsletter'
          ),

        Section::make('footer-contact')
          ->statePath('content')
          ->schema([
            Textarea::make('Address')
              ->label('Address')
              ->hint("Translatable!")
              ->hintColor("info")
              ->required(),

            TextInput::make('phone')
              ->label('Phone')
              ->hintColor("info")
              ->required(),

            TextInput::make('email')
              ->label('Email')
              ->hintColor("info")
              ->email()
              ->required(),

            TextInput::make('twitter')
              ->label('Twitter')
              ->hintColor("info")
              ->url()
              ->required(),

            TextInput::make('facebook')
              ->label('Facebook')
              ->hintColor("info")
              ->url()
              ->required(),

            TextInput::make('linkedIn')
              ->label('Linkedin')
              ->hintColor("info")
              ->url()
              ->required(),

            TextInput::make('instagram')
              ->label('Instagram')
              ->hintColor("info")
              ->url()
              ->required(),

          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'footer-contact'
          )
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
