<?php

namespace App\Filament\Resources\CuisinierProductResource\Pages;

use App\Filament\Resources\CuisinierProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuisinierProduct extends EditRecord
{
    protected static string $resource = CuisinierProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
