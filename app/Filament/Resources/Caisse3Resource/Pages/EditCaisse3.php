<?php

namespace App\Filament\Resources\Caisse3Resource\Pages;

use App\Filament\Resources\Caisse3Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaisse3 extends EditRecord
{
    protected static string $resource = Caisse3Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
