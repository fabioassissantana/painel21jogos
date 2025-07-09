<?php

namespace App\Filament\Resources\ConfigClickResource\Pages;

use App\Filament\Resources\ConfigClickResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfigClick extends EditRecord
{
    protected static string $resource = ConfigClickResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
