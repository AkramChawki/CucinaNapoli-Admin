<?php

namespace App\Filament\Resources\Caisse1Resource\Pages;

use App\Filament\Resources\Caisse1Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaisse1 extends EditRecord
{
    protected static string $resource = Caisse1Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
