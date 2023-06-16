<?php

namespace App\Filament\Resources\ClotureCaisseResource\Pages;

use App\Filament\Resources\ClotureCaisseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClotureCaisses extends ListRecords
{
    protected static string $resource = ClotureCaisseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
