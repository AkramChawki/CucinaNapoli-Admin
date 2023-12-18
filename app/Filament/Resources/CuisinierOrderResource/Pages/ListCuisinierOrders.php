<?php

namespace App\Filament\Resources\CuisinierOrderResource\Pages;

use App\Filament\Resources\CuisinierOrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCuisinierOrders extends ListRecords
{
    protected static string $resource = CuisinierOrderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
