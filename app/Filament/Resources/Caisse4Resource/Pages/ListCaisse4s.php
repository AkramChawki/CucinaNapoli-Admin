<?php

namespace App\Filament\Resources\Caisse4Resource\Pages;

use App\Filament\Resources\Caisse4Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaisse4s extends ListRecords
{
    protected static string $resource = Caisse4Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
