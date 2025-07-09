<?php

namespace App\Filament\Resources\AgentResource\Pages;

use App\Filament\Resources\AgentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListAgents extends ListRecords
{
    protected static string $resource = AgentResource::class;

    protected function getHeaderActions(): array
    {
        if (Auth::guard('agent')->check()) {
            // Agent cannot create other agents
            return [];
        }
        
        // Admin can create agents
        return [
            Actions\CreateAction::make(),
        ];
    }
}
