<?php

namespace App\Filament\Resources\ChiffreAffairePalmierResource\Pages;

use App\Filament\Resources\ChiffreAffairePalmierResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChiffreAffairePalmier extends EditRecord
{
    protected static string $resource = ChiffreAffairePalmierResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
