<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CuisinierProductResource\Pages;
use App\Filament\Resources\CuisinierProductResource\RelationManagers;
use App\Models\CuisinierCategory;
use App\Models\CuisinierProduct;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CuisinierProductResource extends Resource
{
    protected static ?string $model = CuisinierProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Commande Cuisinier';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('cuisinier_category_id')
                    ->label("Category")
                    ->options(CuisinierCategory::all()->pluck("name", "id"))
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('designation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('imputation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('unite')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Stock')
                    ->numeric()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->square(),
                Tables\Columns\TextColumn::make('designation'),
                Tables\Columns\TextColumn::make('imputation'),
                Tables\Columns\TextColumn::make('unite'),
                Tables\Columns\TextColumn::make('Stock'),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListCuisinierProducts::route('/'),
            'create' => Pages\CreateCuisinierProduct::route('/create'),
            'edit' => Pages\EditCuisinierProduct::route('/{record}/edit'),
        ];
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->email == "admin@cucinanapoli.com";
    }
}
