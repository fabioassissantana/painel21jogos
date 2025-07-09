<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Welcome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.welcome';
    protected static ?string $title = 'Bem-vindo';
    protected static ?int $navigationSort = -1;

    public function getTitle(): string
    {
        return 'Bem-vindo';
    }

    public function getHeading(): string
    {
        $agentName = Auth::guard('agent')->user()->agentCode ?? 'Agente';
        return "Bem-vindo, {$agentName}!";
    }
} 