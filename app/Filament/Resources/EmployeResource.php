<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeResource\Pages;
use App\Filament\Resources\EmployeResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class EmployeResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Commande Cuisinier';

    protected static ?string $modelLabel = 'Employe';

    protected static ?string $slug = 'employes';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->maxLength(255)
                    ->hiddenOn(Pages\EditEmploye::class),
                Forms\Components\Select::make('role')
                    ->multiple()
                    ->options(["caisse" => "caisse", "cuisine" => "cuisine", "laboratoire" => "laboratoire", "pizzaolo" => "pizzaolo", "magasin" => "magasin", "salle" => "salle"])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role'),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('email', 'LIKE', '%@cucinanapoli.com');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployes::route('/'),
            'create' => Pages\CreateEmploye::route('/create'),
            'edit' => Pages\EditEmploye::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return true;
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->email == "admin@cucinanapoli.com";
    }
}
