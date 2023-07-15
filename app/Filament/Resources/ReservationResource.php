<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Reservation';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('confirmed')
                    ->options([
                        true => "Oui",
                        false => "non",
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('restau'),
                Tables\Columns\TextColumn::make('adults'),
                Tables\Columns\TextColumn::make('childs'),
                Tables\Columns\TextColumn::make('selectedDate')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('notes'),
                Tables\Columns\IconColumn::make('confirmed')
                    ->label("Confirmed ?")
                    ->boolean(),
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
    
    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->email === "palmier@cucinanapoli.com") {
            return parent::getEloquentQuery()->where('restau', 'Palmier');
        } elseif (auth()->user()->email === "anoual@cucinanapoli.com") {
            return parent::getEloquentQuery()->where("restau", "Anoual");
        } else {
            return parent::getEloquentQuery();
        }
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return str_ends_with(auth()->user()->email, '@cucinanapoli.com');
    }
}
