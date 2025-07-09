<?php

namespace App\Filament\AgentPanel\Pages;

use Filament\Pages\Page;

class AgentDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Visão Geral do Agente';

    protected static string $view = 'filament.agent-panel.pages.agent-dashboard';
}
