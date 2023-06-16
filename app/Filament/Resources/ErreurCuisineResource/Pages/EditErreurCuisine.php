<?php

namespace App\Filament\Resources\ErreurCuisineResource\Pages;

use App\Filament\Resources\ErreurCuisineResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditErreurCuisine extends EditRecord
{
    protected static string $resource = ErreurCuisineResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
