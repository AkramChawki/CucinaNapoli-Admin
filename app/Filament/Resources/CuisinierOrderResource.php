<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CuisinierOrderResource\Pages;
use App\Filament\Resources\CuisinierOrderResource\RelationManagers;
use App\Models\CuisinierOrder;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class CuisinierOrderResource extends Resource
{
    protected static ?string $model = CuisinierOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Commande Cuisinier';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('product_ids')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make("voir")
                    ->label('Voir')
                    ->url(fn (CuisinierOrder $record): string => CuisinierOrderResource::getUrl("details", ["record" => $record]))
                    ->icon('heroicon-o-eye')
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
            'index' => Pages\ListCuisinierOrders::route('/'),
            'create' => Pages\CreateCuisinierOrder::route('/create'),
            'edit' => Pages\EditCuisinierOrder::route('/{record}/edit'),
            'details' => Pages\CuisinierOrderDetails::route('/{record}/details'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->email == "admin@cucinanapoli.com";
    }
}
