<?php

namespace App\Filament\Resources;

use App\Category;
use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
  protected static ?string $model = Category::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TextInput::make('name'),
        TextInput::make('category_slug')
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('id')
          ->sortable(),
        TextColumn::make('name')
          ->searchable()
          ->sortable(),
        TextColumn::make('category_slug')
          ->searchable()
          ->sortable(),
        ImageColumn::make('cover_photo_url')
          ->disk('public')
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
      'index' => Pages\ListCategories::route('/'),
      'create' => Pages\CreateCategory::route('/create'),
      'edit' => Pages\EditCategory::route('/{record}/edit'),
    ];
  }
}
