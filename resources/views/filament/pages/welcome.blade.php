<x-filament-panels::page>
    <div class="space-y-6">
        <!-- Card principal de boas-vindas -->
        <div class="bg-gradient-to-r from-amber-600 to-orange-600 rounded-xl p-8 text-white shadow-lg">
            <div class="flex items-center space-x-4 mb-6">
                <div class="bg-white/20 p-3 rounded-full">
                    <x-heroicon-o-star class="w-8 h-8" />
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Obrigado por adquirir nossa API!</h2>
                    <p class="text-amber-100">{{ config('app.name') }} - Sua solução completa de gestão</p>
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
                <h3 class="text-lg font-semibold mb-3">🚀 Controle Total da Plataforma</h3>
                <p class="text-amber-100 leading-relaxed">
                    Como administrador, você tem acesso completo a todas as funcionalidades da plataforma. 
                    Gerencie agentes, monitore usuários, analise estatísticas e configure o sistema conforme suas necessidades.
                </p>
            </div>
        </div>

        <!-- Permissões do Admin -->
        <div class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-sm border border-gray-200 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                <x-heroicon-o-key class="w-6 h-6 mr-2 text-amber-600" />
                Suas Permissões de Administrador
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Agents -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2 flex items-center">
                        <x-heroicon-o-user-group class="w-5 h-5 mr-2 text-blue-600" />
                        Agents
                    </h4>
                    <div class="space-y-1 text-sm">
                        <span class="inline-flex items-center px-2 py-1 bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 rounded-full">
                            ✅ Ver, Criar, Editar, Excluir
                        </span>
                    </div>
                </div>

                <!-- Users -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2 flex items-center">
                        <x-heroicon-o-user class="w-5 h-5 mr-2 text-green-600" />
                        Users
                    </h4>
                    <div class="space-y-1 text-sm">
                        <span class="inline-flex items-center px-2 py-1 bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 rounded-full">
                            ✅ Ver e Editar
                        </span>
                    </div>
                </div>

                <!-- Spins -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2 flex items-center">
                        <x-heroicon-o-arrow-path class="w-5 h-5 mr-2 text-purple-600" />
                        Spins
                    </h4>
                    <div class="space-y-1 text-sm">
                        <span class="inline-flex items-center px-2 py-1 bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 rounded-full">
                            ✅ Ver e Editar
                        </span>
                    </div>
                </div>

                <!-- Calls -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2 flex items-center">
                        <x-heroicon-o-phone class="w-5 h-5 mr-2 text-orange-600" />
                        Calls
                    </h4>
                    <div class="space-y-1 text-sm">
                        <span class="inline-flex items-center px-2 py-1 bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 rounded-full">
                            ✅ Ver e Editar
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recursos Exclusivos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-sm border border-gray-200 dark:border-gray-600">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="bg-amber-100 dark:bg-amber-800 p-2 rounded-full">
                        <x-heroicon-o-cog-6-tooth class="w-6 h-6 text-amber-700 dark:text-amber-300" />
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Gestão Completa</h3>
                </div>
                <p class="text-gray-700 dark:text-gray-200">
                    Controle total sobre todos os aspectos da plataforma, incluindo criação e gerenciamento de agentes.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-sm border border-gray-200 dark:border-gray-600">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="bg-green-100 dark:bg-green-800 p-2 rounded-full">
                        <x-heroicon-o-chart-bar-square class="w-6 h-6 text-green-700 dark:text-green-300" />
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Relatórios Avançados</h3>
                </div>
                <p class="text-gray-700 dark:text-gray-200">
                    Acesso a todas as estatísticas e relatórios detalhados da plataforma para análise completa.
                </p>
            </div>
        </div>

        <!-- Agradecimento -->
        <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-green-900/20 dark:to-blue-900/20 border border-green-200 dark:border-green-700 rounded-lg p-6">
            <div class="flex items-start space-x-3">
                <div class="bg-green-100 dark:bg-green-800 p-2 rounded-full flex-shrink-0">
                    <x-heroicon-o-heart class="w-6 h-6 text-green-700 dark:text-green-300" />
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-green-900 dark:text-green-100 mb-2">
                        💚 Obrigado pela Confiança!
                    </h3>
                    <p class="text-green-800 dark:text-green-200 leading-relaxed">
                        Agradecemos por escolher nossa API como solução para sua empresa. 
                        Estamos comprometidos em fornecer a melhor experiência possível e suporte contínuo para o sucesso do seu negócio.
                        Sua confiança é fundamental para continuarmos inovando e melhorando nossos serviços.
                    </p>
                </div>
            </div>
        </div>

        <!-- Suporte Premium -->
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 text-center border border-gray-200 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                🏆 Suporte Premium
            </h3>
            <p class="text-gray-700 dark:text-gray-200 mb-4">
                Como cliente da nossa API, você tem acesso ao suporte premium com prioridade máxima.
            </p>
            <div class="flex justify-center space-x-4">
                <span class="inline-flex items-center px-4 py-2 bg-amber-100 dark:bg-amber-800 text-amber-900 dark:text-amber-100 rounded-full text-sm font-medium">
                    <x-heroicon-o-star class="w-4 h-4 mr-2" />
                    Suporte Prioritário
                </span>
                <span class="inline-flex items-center px-4 py-2 bg-green-100 dark:bg-green-800 text-green-900 dark:text-green-100 rounded-full text-sm font-medium">
                    <x-heroicon-o-shield-check class="w-4 h-4 mr-2" />
                    Garantia Total
                </span>
            </div>
        </div>
    </div>
</x-filament-panels::page> 