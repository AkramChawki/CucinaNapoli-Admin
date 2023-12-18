<?php

namespace App\Filament\Resources\ChiffreAffaireAnoualResource\Pages;

use App\Filament\Resources\ChiffreAffaireAnoualResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChiffreAffaireAnouals extends ListRecords
{
    protected static string $resource = ChiffreAffaireAnoualResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
