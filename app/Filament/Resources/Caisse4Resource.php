<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Caisse4Resource\Pages;
use App\Filament\Resources\Caisse4Resource\RelationManagers;
use App\Models\Caisse2;
use App\Models\Caisse4;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class Caisse4Resource extends Resource
{
    protected static ?string $model = Caisse2::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Cloture Caisse - Palmier';

    protected static ?string $modelLabel = '18h-00h';

    protected static ?string $slug = 'Palmier2';

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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('restau')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->searchable(),
                Tables\Columns\TextColumn::make('time')
                    ->time(),
                Tables\Columns\TextColumn::make('caissierE')
                    ->searchable(),
                Tables\Columns\TextColumn::make('caissierS')
                    ->searchable(),
                Tables\Columns\TextColumn::make('montant'),
                Tables\Columns\TextColumn::make('montantE'),
                Tables\Columns\TextColumn::make('glovoE'),
                Tables\Columns\TextColumn::make('glovoC'),
                Tables\Columns\TextColumn::make('cartebancaire'),
                Tables\Columns\TextColumn::make('LivE'),
                Tables\Columns\TextColumn::make('LivC'),
                Tables\Columns\TextColumn::make('Compensation'),
                Tables\Columns\TextColumn::make('virement'),
                Tables\Columns\TextColumn::make('cheque'),
                Tables\Columns\TextColumn::make('ComGlovo'),
                Tables\Columns\TextColumn::make('ComLivraison'),
                Tables\Columns\ImageColumn::make('signature'),
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
            'index' => Pages\ListCaisse4s::route('/'),
            'create' => Pages\CreateCaisse4::route('/create'),
            'edit' => Pages\EditCaisse4::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return true;
    }
    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->where('restau', 'Palmier');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->email == "admin@cucinanapoli.com";
    }
}
