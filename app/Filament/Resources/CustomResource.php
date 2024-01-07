<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomResource\Pages;
use App\Models\Custom;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\ColorPicker;
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

  protected static ?string $navigationGroup = 'Setting';

  protected static $options = [
    'about' => 'About us content',
    'contact' => 'Contact us content',
    'footer-text' => 'Footer text',
    'newsletter' => 'Newsletter',
    'newsletter-button' => 'Newsletter button',
    'newsletter-placeholder' => 'Newsletter placeholder',
    'footer-contact' => 'Footer contact ways',
    'quick-link-title' => 'Quick link title',
    'popular-link-title' => 'Popular link title',
    'copy-right' => 'Copy right text',
    'colors' => 'Colors'
  ];

  public static function form(Form $form): Form
  {

    return $form
      ->schema([
        Section::make('Select content type')
          ->schema([
            Select::make('title')->label('Purpose section')
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
        Section::make('about')->heading('About')
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

        Section::make('contact')->heading('Contact')
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


        Section::make('footer-text')->heading('Footer text')
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

        Section::make('newsletter')->heading('Newsletter')
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

        Section::make('footer-contact')->heading('Footer contact ways')
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
          ),

        Section::make('newsletter-button')->heading('Newsletter button title')
          ->statePath('content')
          ->schema([
            TextInput::make('button-title')->label("Button Title")
              ->hint('Translatable!')
              ->hintColor('info'),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'newsletter-button'
          ),

        Section::make('newsletter-placeholder')->heading('Newsletter input placeholder')
          ->statePath('content')
          ->schema([
            TextInput::make('input-placeholder')->label("Input placeholder")
              ->hint('Translatable!')
              ->hintColor('info'),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'newsletter-placeholder'
          ),

        Section::make('quick-link-title')->heading('Quick link title')
          ->statePath('content')
          ->schema([
            TextInput::make('quick-link-title')->label("Quick link title")
              ->hint('Translatable!')
              ->hintColor('info'),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'quick-link-title'
          ),

        Section::make('popular-link-title')->heading('Popular link title')
          ->statePath('content')
          ->schema([
            TextInput::make('popular-link-title')->label("Popular link title")
              ->hint('Translatable!')
              ->hintColor('info'),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'popular-link-title'
          ),

        Section::make('copy-right')->heading('Copy right text')
          ->statePath('content')
          ->schema([
            TextInput::make('copy-right')->label("Copy right text")
              ->hint('Translatable!')
              ->hintColor('info'),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'copy-right'
          ),

        Section::make('colors')->heading('Colors of website')
          ->statePath('content')
          ->columns([
            'md' => 3,
          ])
          ->schema([
            ColorPicker::make('primary')
              ->label("Primary"),

            ColorPicker::make('secondary')
              ->label("Secondary"),

            ColorPicker::make('text-1')
              ->label("Text 1"),

            ColorPicker::make('text-2')
              ->label("Text 2"),

            ColorPicker::make('text-3')
              ->label("Text 3"),
          ])
          ->hidden(
            fn (Get $get): bool => $get('title') !== 'colors'
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
