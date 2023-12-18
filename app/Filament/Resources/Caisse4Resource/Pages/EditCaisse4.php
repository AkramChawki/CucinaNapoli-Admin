<?php

namespace App\Filament\Resources\Caisse4Resource\Pages;

use App\Filament\Resources\Caisse4Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaisse4 extends EditRecord
{
    protected static string $resource = Caisse4Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
