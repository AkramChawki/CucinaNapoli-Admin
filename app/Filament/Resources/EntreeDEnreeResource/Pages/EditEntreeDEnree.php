<?php

namespace App\Filament\Resources\EntreeDEnreeResource\Pages;

use App\Filament\Resources\EntreeDEnreeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEntreeDEnree extends EditRecord
{
    protected static string $resource = EntreeDEnreeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
