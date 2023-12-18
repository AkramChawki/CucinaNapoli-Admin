<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ChiffreAffaire;
use Filament\Resources\Resource;
use App\Models\ChiffreAffaireAnoual;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\ChiffreAffaireAnoualResource\Pages;
use App\Filament\Resources\ChiffreAffaireAnoualResource\RelationManagers;
use Illuminate\Database\Eloquent\Model;

class ChiffreAffaireAnoualResource extends Resource
{
    protected static ?string $model = ChiffreAffaire::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = "Chiffre d'affaire";

    protected static ?string $modelLabel = 'Anoual';

    protected static ?string $slug = 'ChiffreAffaireAnoual';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('restau')
                    ->required(),
                Forms\Components\TextInput::make('montant')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('montantE')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('glovoE')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('glovoC')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('cartebancaire')
                    ->required(),
                Forms\Components\TextInput::make('LivE')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('LivC')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('virement')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('cheque')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('ComGlovo')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('ComLivraison')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('restau')
                    ->searchable(),
                Tables\Columns\TextColumn::make('montant'),
                Tables\Columns\TextColumn::make('montantE'),
                Tables\Columns\TextColumn::make('glovoE'),
                Tables\Columns\TextColumn::make('glovoC'),
                Tables\Columns\TextColumn::make('cartebancaire'),
                Tables\Columns\TextColumn::make('LivE'),
                Tables\Columns\TextColumn::make('LivC'),
                Tables\Columns\TextColumn::make('virement'),
                Tables\Columns\TextColumn::make('cheque'),
                Tables\Columns\TextColumn::make('ComGlovo'),
                Tables\Columns\TextColumn::make('ComLivraison'),
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
            'index' => Pages\ListChiffreAffaireAnouals::route('/'),
            'create' => Pages\CreateChiffreAffaireAnoual::route('/create'),
            'edit' => Pages\EditChiffreAffaireAnoual::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->where('restau', 'Anoual');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->email == "admin@cucinanapoli.com";
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }
}
