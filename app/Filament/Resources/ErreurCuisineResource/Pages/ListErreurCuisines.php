<?php

namespace App\Filament\Resources\ErreurCuisineResource\Pages;

use App\Filament\Resources\ErreurCuisineResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListErreurCuisines extends ListRecords
{
    protected static string $resource = ErreurCuisineResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
