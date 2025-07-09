<?php

namespace App\Filament\Resources\ConfigClickResource\Pages;

use App\Filament\Resources\ConfigClickResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfigClicks extends ListRecords
{
    protected static string $resource = ConfigClickResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(), // Removido para agentes
        ];
    }
}
