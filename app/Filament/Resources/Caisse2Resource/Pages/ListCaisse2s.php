<?php

namespace App\Filament\Resources\Caisse2Resource\Pages;

use App\Filament\Resources\Caisse2Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaisse2s extends ListRecords
{
    protected static string $resource = Caisse2Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
