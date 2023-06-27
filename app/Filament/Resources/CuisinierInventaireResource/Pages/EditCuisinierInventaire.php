<?php

namespace App\Filament\Resources\CuisinierInventaireResource\Pages;

use App\Filament\Resources\CuisinierInventaireResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuisinierInventaire extends EditRecord
{
    protected static string $resource = CuisinierInventaireResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
