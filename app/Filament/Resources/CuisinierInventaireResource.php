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
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class CuisinierInventaireResource extends Resource
{
    protected static ?string $model = CuisinierInventaire::class;

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
            Forms\Components\TextInput::make('restau')
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
                Tables\Columns\TextColumn::make('restau')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make("pdf")
                    ->label('pdf')
                    ->url(fn (CuisinierInventaire $record): string => "https://restaurant.cucinanapoli.com/storage/documents/$record->pdf")
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document'),
                Action::make("voir")
                    ->label('Voir')
                    ->url(fn (CuisinierInventaire $record): string => CuisinierInventaireResource::getUrl("details", ["record" => $record]))
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

    public static function canCreate(): bool
    {
        return false;
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCuisinierInventaires::route('/'),
            'create' => Pages\CreateCuisinierInventaire::route('/create'),
            'edit' => Pages\EditCuisinierInventaire::route('/{record}/edit'),
            'details' => Pages\CuisinierInventaireDetails::route('/{record}/details'),

        ];
    }    

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->email == "admin@cucinanapoli.com";
    }
}
