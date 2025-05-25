<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerAdvertisementResource\Pages;
use App\Filament\Resources\BannerAdvertisementResource\RelationManagers;
use App\Models\BannerAdvertisement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerAdvertisementResource extends Resource
{
  protected static ?string $model = BannerAdvertisement::class;

  protected static ?string $navigationIcon = 'heroicon-o-photo';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('link')
          ->required()
          ->url()
          ->maxLength(255),

        Forms\Components\TextInput::make('type')
          ->required()
          ->maxLength(255),

        Forms\Components\FileUpload::make('thumbnail')
          ->required()
          ->image(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('link')
          ->searchable()
          ->sortable(),

        Tables\Columns\TextColumn::make('type')
          ->searchable()
          ->sortable(),

        Tables\Columns\ImageColumn::make('thumbnail')
          ->circular(),
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
      'index' => Pages\ListBannerAdvertisements::route('/'),
      'create' => Pages\CreateBannerAdvertisement::route('/create'),
      'edit' => Pages\EditBannerAdvertisement::route('/{record}/edit'),
    ];
  }
}
