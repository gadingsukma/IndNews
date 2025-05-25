<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleNewsResource\Pages;
use App\Filament\Resources\ArticleNewsResource\RelationManagers;
use App\Models\ArticleNews;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleNewsResource extends Resource
{
  protected static ?string $model = ArticleNews::class;

  protected static ?string $navigationIcon = 'heroicon-o-newspaper';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('name')
          ->required()
          ->maxLength(255),

        // Forms\Components\TextInput::make('slug')
        //   ->required()
        //   ->disabled(),

        Forms\Components\Select::make('category_id')
          ->relationship('category', 'name')
          ->required()
          ->searchable()
          ->preload()
          ->placeholder('Select Category'),

        Forms\Components\Select::make('author_id')
          ->relationship('author', 'name')
          ->required()
          ->searchable()
          ->preload()
          ->placeholder('Select Author'),

        Forms\Components\Select::make('is_featured')
          ->options([
            'featured' => 'Featured',
            'not_featured' => 'Not Featured',
          ])
          ->required(),

        Forms\Components\FileUpload::make('thumbnail')
          ->image()
          ->required(),

        // Forms\Components\Textarea::make('content')
        //   ->required()
        //   ->maxLength(65535),

        Forms\Components\RichEditor::make('content')
          ->required()
          ->columnSpanFull()
          ->maxLength(65535)
          ->toolbarButtons([
            'attachFiles',
            'blockquote',
            'bold',
            'bulletList',
            'codeBlock',
            'h1',
            'h2',
            'h3',
            'italic',
            'link',
            'orderedList',
            'redo',
            'strike',
            'underline',
            'undo',
          ]),
        // ->toolbarButtons([
        //   'attachFile',
        //   'blockQuote',
        //   'code',
        //   'h1',
        //   'h2',
        //   'h3',
        //   'h4',
        //   'h5',
        //   'h6',
        //   'paragraph',
        //   'bold',
        //   'italic',
        //   'underline',
        //   'link',
        //   'bulletList',
        //   'numberedList',
        //   'blockquote',
        //   'codeBlock',
        //   'strike',
        //   'subscript',
        //   'superscript',
        //   'clear',
        //   'horizontalRule',
        //   'outdent',
        //   'indent',
        //   'insertTable',
        //   'insertImage',
        //   'insertVideo',
        //   'insertHorizontalRule',
        //   'insertLink',
        //   'image',
        //   'table',
        //   'undo',
        //   'redo',
        //   'clearFormatting',
        //   'fullscreen',
        //   'help',
        // ]),

      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('name')
          ->searchable()
          ->sortable(),

        // Tables\Columns\TextColumn::make('slug')
        //   ->sortable()
        //   ->searchable(),

        Tables\Columns\TextColumn::make('category.name')
          ->label('Category')
          ->sortable()
          ->searchable(),

        // Tables\Columns\TextColumn::make('author.name')
        //   ->label('Author')
        //   ->sortable()
        //   ->searchable(),

        // Tables\Columns\BooleanColumn::make('is_featured')
        //   ->label('Featured')
        //   ->trueIcon('heroicon-o-check-circle')
        //   ->falseIcon('heroicon-o-x-circle'),

        Tables\Columns\TextColumn::make('is_featured')
          ->badge()
          ->color(fn(string $state): string => match ($state) {
            'featured' => 'success',
            'not_featured' => 'warning',
          })
          ->sortable()
          ->searchable(),

        Tables\Columns\ImageColumn::make('thumbnail'),
          // ->circular(),
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
      'index' => Pages\ListArticleNews::route('/'),
      'create' => Pages\CreateArticleNews::route('/create'),
      'edit' => Pages\EditArticleNews::route('/{record}/edit'),
    ];
  }
}
