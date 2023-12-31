<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReclamationResource\Pages;
use App\Filament\Resources\ReclamationResource\RelationManagers;
use App\Models\Reclamation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ReclamationResource extends Resource
{
    protected static ?string $model = Reclamation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Restaurant';

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
                Forms\Components\TextInput::make('ticket')
                    ->required(),
                Forms\Components\TextInput::make('objet')
                    ->required(),
                Forms\Components\TextInput::make('canal')
                    ->required(),
                Forms\Components\Textarea::make('plat')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Textarea::make('motif')
                    ->columnSpan(2)
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
                    ->label('date')
                    ->date(),
                Tables\Columns\TextColumn::make('ticket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objet'),
                Tables\Columns\TextColumn::make('canal'),
                Tables\Columns\TextColumn::make('plat'),
                Tables\Columns\TextColumn::make('motif'),
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
            'index' => Pages\ListReclamations::route('/'),
            'create' => Pages\CreateReclamation::route('/create'),
            'edit' => Pages\EditReclamation::route('/{record}/edit'),
        ];
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->email == "admin@cucinanapoli.com";
    }
}
