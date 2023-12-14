<?php

namespace App\Filament\Resources\SimulationsResource\Pages;

use App\Filament\Resources\SimulationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSimulations extends EditRecord
{
    protected static string $resource = SimulationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
