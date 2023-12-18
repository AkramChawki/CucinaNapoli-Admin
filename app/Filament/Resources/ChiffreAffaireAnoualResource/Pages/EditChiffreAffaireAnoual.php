<?php

namespace App\Filament\Resources\ChiffreAffaireAnoualResource\Pages;

use App\Filament\Resources\ChiffreAffaireAnoualResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChiffreAffaireAnoual extends EditRecord
{
    protected static string $resource = ChiffreAffaireAnoualResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
