<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ErreurCuisineResource\Pages;
use App\Filament\Resources\ErreurCuisineResource\RelationManagers;
use App\Models\ErreurCuisine;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ErreurCuisineResource extends Resource
{
    protected static ?string $model = ErreurCuisine::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Commande Cuisinier';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('erreur')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('date'),
                Tables\Columns\TextColumn::make('erreur'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->date(),
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
            'index' => Pages\ListErreurCuisines::route('/'),
            'create' => Pages\CreateErreurCuisine::route('/create'),
            'edit' => Pages\EditErreurCuisine::route('/{record}/edit'),
        ];
    }
}
