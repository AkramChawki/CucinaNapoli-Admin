<?php

namespace App\Filament\Resources\Caisse3Resource\Pages;

use App\Filament\Resources\Caisse3Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaisse3s extends ListRecords
{
    protected static string $resource = Caisse3Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
