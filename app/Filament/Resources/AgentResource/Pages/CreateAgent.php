<?php

namespace App\Filament\Resources\AgentResource\Pages;

use App\Filament\Resources\AgentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Filament\Notifications\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class CreateAgent extends CreateRecord
{
    protected static string $resource = AgentResource::class;

    public ?string $plainPassword = null;

    protected function handleRecordCreation(array $data): Model
    {
        $this->plainPassword = $data['senha']; // Armazena a senha em texto puro
        $data['senha'] = bcrypt($data['senha']);

        return static::getModel()::create($data);
    }

    protected function getCreatedNotification(): ?Notification
    {
        $agentCode = $this->record->agentCode;
        $senha = $this->plainPassword; // Usa a senha em texto puro
        $agentToken = $this->record->agentToken;
        $secretKey = $this->record->secretKey;
        $appUrl = config('app.url');

        $fullTextToCopy = "Agente Criado com Sucesso!\n\n" .
            "O novo agente foi provisionado em nossa plataforma.\n\n" .
            "Código do Agente: {$agentCode}\n" .
            "Senha: {$senha}\n" .
            "Agent Token: {$agentToken}\n" .
            "Secret Key: {$secretKey}\n\n" .
            "Por favor, para editar seu agente, entre em: {$appUrl}/agent

" .
            "Garanta a segurança dessas informações. Agradecemos por expandir nossa parceria!";

        $dataToCopy = json_encode([
            'fullText' => $fullTextToCopy,
        ]);
        $encodedData = base64_encode($dataToCopy);

        return Notification::make()
            ->success()
            ->title('Agente Criado com Sucesso!')
            ->body(new HtmlString(
                "O novo agente foi provisionado em nossa plataforma.<br><br>" .
                "<strong>Código do Agente:</strong> {$agentCode}<br>" .
                "<strong>Senha:</strong> {$senha}<br>" .
                "<strong>Agent Token:</strong> {$agentToken}<br>" .
                "<strong>Secret Key:</strong> {$secretKey}<br><br>" .
                "Por favor, para editar seu agente, entre em: <a href='" . $appUrl . "/agent' target='_blank' class='text-primary-600 hover:underline'>" . $appUrl . "/agent</a><br><br>" .
                "Garanta a segurança dessas informações. Agradecemos por expandir nossa parceria!"
            ))
            ->persistent()
            ->actions([
                Action::make('copy-credentials')
                    ->label('Copiar Credenciais')
                    ->button()
                    ->color('primary')
                    ->url("javascript:window.copyAgentCredentials('" . rawurlencode($encodedData) . "');"),
            ]);
    }
}
