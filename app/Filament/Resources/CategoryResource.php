<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    //me permet d'afficher le formulaire pour la création de mes categories en me basant sur la structure de ma table 'name' et 'icon' 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Textarea::make('icon')
                    ->maxLength(65535),
            ]);
    }

    //me permet d'afficher/lister les category dans mon interface administrateur
    //me permet d'editer une category
    //me permet de supprimer une category
    public static function table(Table $table): Table
    {
        return $table
            ->columns([ //me permet d'afficher/lister les category dans mon interface administrateur//me permet d'afficher/lister les category dans mon interface administrateur
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('icon'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(), //me permet d'editer une category
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(), //me permet de supprimer une category
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
