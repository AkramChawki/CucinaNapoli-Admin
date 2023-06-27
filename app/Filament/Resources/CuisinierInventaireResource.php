<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CuisinierInventaireResource\Pages;
use App\Filament\Resources\CuisinierInventaireResource\RelationManagers;
use App\Models\CuisinierInventaire;
use App\Models\CuisinierProduct;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class CuisinierInventaireResource extends Resource
{
    protected static ?string $model = CuisinierInventaire::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('cuisinier_product_id')
                    ->options(CuisinierProduct::all()->pluck("designation", "id"))
                    ->required(),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.designation')
                    ->label("Designation"),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Date")
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
                ExportBulkAction::make()
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
            'index' => Pages\ListCuisinierInventaires::route('/'),
            'create' => Pages\CreateCuisinierInventaire::route('/create'),
            'edit' => Pages\EditCuisinierInventaire::route('/{record}/edit'),
        ];
    }    
}
