<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FicheResource\Pages;
use App\Filament\Resources\FicheResource\RelationManagers;
use App\Models\CuisinierProduct;
use App\Models\Fiche;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class FicheResource extends Resource
{
    protected static ?string $model = Fiche::class;

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
                Tables\Actions\Action::make("ajoute")
                    ->icon("heroicon-o-plus")
                    ->mountUsing(fn (Forms\ComponentContainer $form, Fiche $record) => $form->fill([
                        'fiche_id' => $record->id,
                    ]))
                    ->action(function (Fiche $record, array $data): void {
                        foreach ($data["cuisinier_product_ids"] as $product_id) {
                            DB::insert('insert into fiche_cuisinier_product (cuisinier_product_id, 	fiche_id) values (?, ?)', [$product_id, $data["fiche_id"]]);
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('cuisinier_product_ids')
                            ->label('produit')
                            ->options(CuisinierProduct::query()->pluck('designation', 'id'))
                            ->required()
                            ->multiple()
                            ->searchable(),
                        Forms\Components\Select::make('fiche_id')
                            ->label('fiche')
                            ->options(Fiche::query()->pluck('name', 'id'))
                            ->required()
                            ->disabled(),
                    ]),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFiches::route('/'),
            'create' => Pages\CreateFiche::route('/create'),
            'edit' => Pages\EditFiche::route('/{record}/edit'),
        ];
    }
}
