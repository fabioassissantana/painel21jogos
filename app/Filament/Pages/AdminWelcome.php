<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class AdminWelcome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.admin-welcome';
    protected static ?string $title = 'Bem-vindo';
    protected static ?int $navigationSort = -1;

    public function getTitle(): string
    {
        return 'Bem-vindo';
    }

    public function getHeading(): string
    {
        $adminName = Auth::guard('admin')->user()->name ?? 'Administrador';
        return "Bem-vindo, {$adminName}!";
    }
} 