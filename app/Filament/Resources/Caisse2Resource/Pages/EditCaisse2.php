<?php

namespace App\Filament\Resources\Caisse2Resource\Pages;

use App\Filament\Resources\Caisse2Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaisse2 extends EditRecord
{
    protected static string $resource = Caisse2Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
