@if ($this->showCreatedAgentModal && $this->createdAgent)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-md rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800">
            <div class="text-center space-y-4">
                <h2 class="text-2xl font-bold">Agente Criado com Sucesso!</h2>
                <p>O novo agente foi provisionado em nossa plataforma.</p>
                <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg text-left">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Código do Agente</dt>
                        <dd class="text-sm text-gray-900 dark:text-white sm:col-span-1 font-mono">{{ $this->createdAgent->agentCode }}</dd>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Senha</dt>
                        <dd class="text-sm text-gray-900 dark:text-white sm:col-span-1 font-mono">{{ $this->createdAgent->senha }}</dd>
                    </dl>
                </div>
                <p>Por favor, para editar seu agent, entre em:</p>
                <a href="{{ $this->getEditUrl() }}" target="_blank" class="text-primary-600 hover:underline">{{ $this->getEditUrl() }}</a>
                <p class="font-bold pt-4">Guarde essas informações em um lugar seguro.</p>
            </div>
            <div class="mt-6 flex justify-end">
                <button wire:click="closeModal" class="filament-button filament-button-size-md filament-button-color-gray">
                    Fechar
                </button>
            </div>
        </div>
    </div>
@endif
