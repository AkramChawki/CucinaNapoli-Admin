<?php

namespace App\Filament\Resources\CuisinierInventaireResource\Pages;

use App\Filament\Resources\CuisinierInventaireResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCuisinierInventaires extends ListRecords
{
    protected static string $resource = CuisinierInventaireResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
