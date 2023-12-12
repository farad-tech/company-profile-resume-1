<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use App\Models\BlogCategory;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class BlogResource extends Resource
{
  use Translatable;
  protected static ?string $model = Blog::class;

  // protected static ?string $navigationIcon = 'heroicon-o-document-text';

  protected static ?string $navigationGroup = 'Blog';

  public static function form(Form $form): Form
  {
    $categories_model = BlogCategory::select('id', 'title')->get()->toArray();
    $categories = [];

    foreach ($categories_model as $category) {
      $categories[$category['id']] = $category['title']['en'];
    }

    return $form
      ->schema([
        Fieldset::make('details')
          ->schema([
            TextInput::make('title')
              ->required(),

            FileUpload::make('image')
              ->image()
              ->downloadable()
              ->imageEditor()
              ->directory('blogs')
              ->required(),

            Select::make('category')
              ->options($categories)
              ->required(),
            TagsInput::make('keywords')
              ->required(),
          ])->columnSpan([
            'sm' => 12,
          ]),
        RichEditor::make('content')
          ->required()
          ->columnSpan([
            'sm' => 12,
          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title'),
        TextColumn::make('category'),
        TextColumn::make('author'),
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
      'index' => Pages\ListBlogs::route('/'),
      'create' => Pages\CreateBlog::route('/create'),
      'edit' => Pages\EditBlog::route('/{record}/edit'),
    ];
  }
}
