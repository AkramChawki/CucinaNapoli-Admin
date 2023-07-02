<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Tables\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Menu';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->options([
                        "waiting" => "En attente",
                        "delivred" => "Livrée",
                        "Cancelled" => "Annulée",
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label("Client"),
                Tables\Columns\TextColumn::make('restaurant'),
                Tables\Columns\TextColumn::make('num')
                    ->label("Code"),
                Tables\Columns\TextColumn::make('telephone'),
                Tables\Columns\TextColumn::make('delivery_type')
                    ->label("Methode de Livraison"),
                Tables\Columns\IconColumn::make('use_whatsapp')
                    ->label("Whatsapp ?")
                    ->boolean(),
                Tables\Columns\TextColumn::make('total'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Date")
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make("voir")
                    ->label('Voir')
                    ->url(fn (Order $record): string => OrderResource::getUrl("details", ["record" => $record]))
                    ->icon('heroicon-o-eye')
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOrders::route('/'),
            'details' => Pages\OrderDetails::route('/{record}/details'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }


    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->email === "palmier@cucinanapoli.com") {
            return parent::getEloquentQuery()->where('restaurant', 'palmier');
        } elseif (auth()->user()->email === "anoual@cucinanapoli.com") {
            return parent::getEloquentQuery()->where("restaurant", "anoual");
        } else {
            return parent::getEloquentQuery();
        }
    }


    protected static function shouldRegisterNavigation(): bool
    {
        return str_ends_with(auth()->user()->email, '@cucinanapoli.com');
    }
}
