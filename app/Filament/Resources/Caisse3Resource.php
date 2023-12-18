<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Caisse3Resource\Pages;
use App\Filament\Resources\Caisse3Resource\RelationManagers;
use App\Models\Caisse1;
use App\Models\Caisse3;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class Caisse3Resource extends Resource
{
    protected static ?string $model = Caisse1::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Cloture Caisse - Palmier';

    protected static ?string $modelLabel = '12h-18h';

    protected static ?string $slug = 'Palmier1';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('restau')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TimePicker::make('time')
                    ->required(),
                Forms\Components\TextInput::make('caissierE')
                    ->required(),
                Forms\Components\TextInput::make('caissierS')
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
                Forms\Components\TextInput::make('Compensation')
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
            'index' => Pages\ListCaisse3s::route('/'),
            'create' => Pages\CreateCaisse3::route('/create'),
            'edit' => Pages\EditCaisse3::route('/{record}/edit'),
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
