<?php

namespace App\Filament\Resources\CuisinierOrderResource\Pages;

use App\Filament\Resources\CuisinierOrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuisinierOrder extends EditRecord
{
    protected static string $resource = CuisinierOrderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
