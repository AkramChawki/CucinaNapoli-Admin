<?php

namespace App\Filament\Resources\ReclamationResource\Pages;

use App\Filament\Resources\ReclamationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReclamations extends ListRecords
{
    protected static string $resource = ReclamationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
