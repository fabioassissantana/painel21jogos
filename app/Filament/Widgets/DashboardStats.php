<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Agent;
use App\Models\User;
use App\Models\Spin;
use App\Models\Call;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;
use Filament\Actions\Concerns\InteractsWithActions as HasFilamentActions;
use Filament\Actions\Action;

class DashboardStats extends BaseWidget
{
    use HasFilamentActions;

    // Adicione esta linha temporariamente para forçar o recarregamento
    // dd('DashboardStats carregado');

    protected static string $view = 'filament.widgets.dashboard-stats';

    protected ?string $heading = 'Visão Geral';

    protected function getCards(): array
    {
        return [
            Card::make('Total de Agents', Agent::count())
                ->color('success')
                ->icon('heroicon-o-user-group'),
            Card::make('Total de Users', User::count())
                ->color('primary')
                ->icon('heroicon-o-user'),
            Card::make('Total de Spins', Spin::count())
                ->color('info')
                ->icon('heroicon-o-arrow-path'),
            Card::make('Total de Calls', Call::count())
                ->color('warning')
                ->icon('heroicon-o-phone'),
            Card::make('Users Influencer', User::where('isinfluencer', 1)->count())
                ->color('danger')
                ->icon('heroicon-o-star'),
            Card::make('Dias Restantes', 'Plano semanal')
                ->color('info')
                ->icon('heroicon-o-calendar-days'),
            Card::make('Zerar users nao influencer', 'Clique aqui')
                ->icon('heroicon-o-user-minus')
                ->extraAttributes([
                    'class' => 'dashboard-action-btn cursor-pointer font-bold text-lg',
                    'style' => 'background-color: #1E40AF; color: white !important;',
                    'wire:click' => 'triggerZerarUsersNaoInfluencer',
                ]),
            Card::make('Zerar spins', 'Clique aqui')
                ->icon('heroicon-o-arrow-path-rounded-square')
                ->extraAttributes([
                    'class' => 'dashboard-action-btn cursor-pointer font-bold text-lg',
                    'style' => 'background-color: #92400E; color: white !important;',
                    'wire:click' => 'triggerZerarSpins',
                ]),
            Card::make('Zerar calls', 'Clique aqui')
                ->icon('heroicon-o-phone-x-mark')
                ->extraAttributes([
                    'class' => 'dashboard-action-btn cursor-pointer font-bold text-lg',
                    'style' => 'background-color: #7F1D1D; color: white !important;',
                    'wire:click' => 'triggerZerarCalls',
                ]),
        ];
    }

    public function triggerZerarUsersNaoInfluencer()
    {
        $this->zerarUsersNaoInfluencerAction()->call();
    }

    public function triggerZerarSpins()
    {
        $this->zerarSpinsAction()->call();
    }

    public function triggerZerarCalls()
    {
        $this->zerarCallsAction()->call();
    }

    public function zerarUsersNaoInfluencerAction(): Action
    {
        return Action::make('zerarUsersNaoInfluencer')
            ->requiresConfirmation()
            ->action(function () {
                DB::statement('DELETE FROM users WHERE isinfluencer = 0');
                Notification::make()
                    ->title('Usuários não influencers zerados com sucesso!')
                    ->success()
                    ->send();
            });
    }

    public function zerarSpinsAction(): Action
    {
        return Action::make('zerarSpins')
            ->requiresConfirmation()
            ->action(function () {
                DB::statement('TRUNCATE spins');
                Notification::make()
                    ->title('Spins zerados com sucesso!')
                    ->success()
                    ->send();
            });
    }

    public function zerarCallsAction(): Action
    {
        return Action::make('zerarCalls')
            ->requiresConfirmation()
            ->action(function () {
                DB::statement('TRUNCATE calls');
                Notification::make()
                    ->title('Calls zeradas com sucesso!')
                    ->success()
                    ->send();
            });
    }
}
