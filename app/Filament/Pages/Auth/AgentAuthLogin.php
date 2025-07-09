<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLogin;

class AgentAuthLogin extends BaseLogin
{
    protected static string $view = 'filament.auth.agent-login';
    protected function getEmailFormComponent(): TextInput
    {
        return TextInput::make('agentCode')
            ->label(__('Código do Agente'))
            ->required()
            ->autocomplete('username')
            ->autofocus();
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'agentCode' => $data['agentCode'],
            'password' => $data['password'],
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    protected function throwFailureValidationException(): never
    {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'data.agentCode' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }
}
