<?php

namespace App\Filament\Resources\ClotureCaisseResource\Pages;

use App\Filament\Resources\ClotureCaisseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClotureCaisse extends EditRecord
{
    protected static string $resource = ClotureCaisseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
