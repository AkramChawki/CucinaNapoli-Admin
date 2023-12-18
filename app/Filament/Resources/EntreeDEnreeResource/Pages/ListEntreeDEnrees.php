<?php

namespace App\Filament\Resources\EntreeDEnreeResource\Pages;

use App\Filament\Resources\EntreeDEnreeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntreeDEnrees extends ListRecords
{
    protected static string $resource = EntreeDEnreeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
