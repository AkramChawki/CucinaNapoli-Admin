<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntreeDEnreeResource\Pages;
use App\Filament\Resources\EntreeDEnreeResource\RelationManagers;
use App\Models\EntreeDEnree;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntreeDEnreeResource extends Resource
{

    protected static ?string $model = EntreeDEnree::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = "Chiffres";

    protected static ?string $modelLabel = "Entree d'Enree";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEntreeDEnrees::route('/'),
            'create' => Pages\CreateEntreeDEnree::route('/create'),
            'edit' => Pages\EditEntreeDEnree::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return true;
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->email == "akramchawki01@gmail.com";
    }
}
