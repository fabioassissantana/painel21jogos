<x-filament-panels::page>
    <div class="space-y-6">
        <!-- Card principal de boas-vindas -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl p-8 text-white shadow-lg">
            <div class="flex items-center space-x-4 mb-6">
                <div class="bg-white/20 p-3 rounded-full">
                    <x-heroicon-o-rocket-launch class="w-8 h-8" />
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Bem-vindo ao {{ config('app.name') }}!</h2>
                    <p class="text-blue-100">Sua plataforma de gestão está pronta para uso</p>
                </div>
            </div>
            
            @php
                $logoPath = \App\Models\Setting::where('key', 'logo_path')->value('value');
            @endphp
            @if($logoPath)
                <div class="mb-6 flex justify-center">
                    <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo" style="max-height: 150px; max-width: 150px;">
                </div>
            @endif

            <div class="bg-white/10 rounded-lg p-6 backdrop-blur-sm">
                <h3 class="text-lg font-semibold mb-3">⚡ Use sem moderação!</h3>
                <p class="text-blue-100 leading-relaxed">
                    Você tem acesso completo às ferramentas de gestão da sua conta. 
                    Monitore seus usuários, analise estatísticas e otimize seus resultados.
                </p>
            </div>
        </div>

        <!-- Cards informativos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-sm border border-gray-200 dark:border-gray-600">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="bg-green-100 dark:bg-green-800 p-2 rounded-full">
                        <x-heroicon-o-shield-check class="w-6 h-6 text-green-700 dark:text-green-300" />
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Segurança Garantida</h3>
                </div>
                <p class="text-gray-700 dark:text-gray-200">
                    Seus dados estão protegidos com criptografia avançada e acesso restrito apenas aos seus recursos.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-sm border border-gray-200 dark:border-gray-600">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="bg-blue-100 dark:bg-blue-800 p-2 rounded-full">
                        <x-heroicon-o-chart-bar class="w-6 h-6 text-blue-700 dark:text-blue-300" />
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Análise em Tempo Real</h3>
                </div>
                <p class="text-gray-700 dark:text-gray-200">
                    Acompanhe o desempenho dos seus usuários e tome decisões baseadas em dados atualizados.
                </p>
            </div>
        </div>

        <!-- Aviso de responsabilidade -->
        <div class="bg-amber-50 dark:bg-amber-900/30 border border-amber-200 dark:border-amber-700 rounded-lg p-6">
            <div class="flex items-start space-x-3">
                <div class="bg-amber-100 dark:bg-amber-800 p-2 rounded-full flex-shrink-0">
                    <x-heroicon-o-exclamation-triangle class="w-6 h-6 text-amber-700 dark:text-amber-300" />
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-amber-900 dark:text-amber-100 mb-2">
                        ⚠️ Importante: Responsabilidade Exclusiva
                    </h3>
                    <p class="text-amber-800 dark:text-amber-200 leading-relaxed">
                        <strong>Qualquer configuração, modificação ou ação realizada nesta plataforma é de responsabilidade exclusivamente sua.</strong> 
                        Certifique-se de entender completamente as implicações de cada alteração antes de executá-la. 
                        Mantenha sempre backups das configurações importantes e utilize as ferramentas com consciência e responsabilidade.
                    </p>
                </div>
            </div>
        </div>

        <!-- Suporte -->
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 text-center border border-gray-200 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                Precisa de Ajuda?
            </h3>
            <p class="text-gray-700 dark:text-gray-200 mb-4">
                Nossa equipe está disponível para suporte técnico e orientações sobre o uso da plataforma.
            </p>
            <div class="flex justify-center space-x-4">
                <span class="inline-flex items-center px-4 py-2 bg-blue-100 dark:bg-blue-800 text-blue-900 dark:text-blue-100 rounded-full text-sm font-medium">
                    <x-heroicon-o-envelope class="w-4 h-4 mr-2" />
                    Suporte Técnico
                </span>
                <span class="inline-flex items-center px-4 py-2 bg-green-100 dark:bg-green-800 text-green-900 dark:text-green-100 rounded-full text-sm font-medium">
                    <x-heroicon-o-phone class="w-4 h-4 mr-2" />
                    Atendimento 24/7
                </span>
            </div>
        </div>
    </div>
</x-filament-panels::page> 