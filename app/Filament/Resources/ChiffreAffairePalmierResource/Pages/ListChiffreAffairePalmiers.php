<?php

namespace App\Filament\Resources\ChiffreAffairePalmierResource\Pages;

use App\Filament\Resources\ChiffreAffairePalmierResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChiffreAffairePalmiers extends ListRecords
{
    protected static string $resource = ChiffreAffairePalmierResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
