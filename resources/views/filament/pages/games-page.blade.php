<x-filament-panels::page>
    <div class="fi-page-content">
        <!-- Header com estatísticas -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold mb-2 flex items-center">
                            <span class="mr-3">🎮</span>
                            Jogos Ativos
                        </h1>
                        <p class="text-emerald-100 text-lg">{{ count($this->games) }} jogos disponíveis na plataforma</p>
                    </div>
                    <div class="text-right">
                        <div class="flex items-center justify-end space-x-2 mb-3">
                            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse shadow-lg"></div>
                            <span class="text-emerald-100 font-medium">Todos online</span>
                        </div>
                        <div class="text-4xl font-bold">{{ count($this->games) }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid de jogos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-6">
            @php
                $gameImages = [
                    'jungle-delight' => 'https://kto.kgp-cdn.com/kto/2023/11/20130404/Ganesha-Goldx-654d10095743c-kto_compressed-w1024.webp',
                    'fortune-ox' => 'https://kto.kgp-cdn.com/kto/2023/11/20130420/Double-Fortunex-654d10005d794-kto_compressed-w1024.webp',
                    'dragon-tiger-luck' => 'https://kto.kgp-cdn.com/kto/2023/11/20130412/Fortune-Mousex--654d10038be41-kto_compressed-w1024.webp',
                    'ganesha-gold' => 'https://kto.kgp-cdn.com/kto/2023/11/20131129/bikini-paradisex-654d0e612a4b8-kto_compressed-w1024.webp',
                    'double-fortune' => 'https://kto.kgp-cdn.com/kto/2023/11/20130402/Fortune-Tigerx-654d100a2eb9d-kto_compressed-w1024.webp',
                    'fortune-mouse' => 'https://kto.kgp-cdn.com/kto/2023/11/20130529/fortune-rabbitx-654d0fc1912e2-kto_compressed-w1024.webp',
                    'bikini-paradise' => 'https://kto.kgp-cdn.com/kto/2024/01/29151756/Fortune-Dragon_2x-kto_compressed-w1024.webp',
                    'fortune-tiger' => 'https://kto.kgp-cdn.com/kto/2024/03/18150702/Cash-Mania_2x-kto_compressed-w1024.webp',
                    'fortune-rabbit' => 'https://kto.kgp-cdn.com/kto/2024/06/17132846/Treasures-of-Aztec_2x-kto_compressed-w1024.webp',
                    'fortune-dragon' => 'https://kto.kgp-cdn.com/kto/2023/11/20130433/Piggy-Goldx-654d0ff49b796-kto_compressed-w1024.webp',
                    'cash-mania' => 'https://kto.kgp-cdn.com/kto/2023/11/20130405/Wild-Banditox-654d10087d35c-kto_compressed-w1024.webp',
                    'treasures-aztec' => 'https://kto.kgp-cdn.com/kto/2024/07/02143226/Zombie-Outbreak_2x-kto_compressed-w1024.webp',
                    'piggy-gold' => 'https://kto.kgp-cdn.com/kto/2023/11/20130421/Majestic-Treasuresx-654d0ffe4463e-kto_compressed-w1024.webp',
                    'wild-bandito' => 'https://kto.kgp-cdn.com/kto/2023/11/20131454/Butterfly-Blossomx-654d0da075657-kto_compressed-w1024.webp',
                    'zombie-outbreak' => 'https://kto.kgp-cdn.com/kto/2025/01/06162146/Fortune-Snake-2x-kto_compressed-w1024.webp',
                    'majestic-ts' => 'https://kto.kgp-cdn.com/kto/2023/11/20131531/Guardian-of-Ice-and-Firex-654d0d8286b6b-kto_compressed-w1024.webp',
                    'butterfly-blossom' => 'https://kto.kgp-cdn.com/kto/2023/11/20132839/KTOnewtilesSpinomenal-x---654d0aa8e0d59-kto_compressed-w1024.webp',
                    'fortune-snake' => 'https://kto.kgp-cdn.com/kto/2023/11/20130434/Rise-of-Apollox-654d0ff27c0e4-kto_compressed-w1024.webp',
                    'gdn-ice-fire' => 'https://kto.kgp-cdn.com/kto/2023/11/20133205/Ninja-Raccoon-Frenzyx-654d0a0825ebd-kto_compressed-w1024.webp',
                    'thai-river' => 'https://www.pgsoft.com/uploads/Games/Images/9a6abdb9-bc87-4155-8a82-e792b2a5608a.jpg',
                    'rise-apollo' => 'https://kto.kgp-cdn.com/kto/2023/11/20134202/Ultimate-Strikerx--654ce64cccf4d-kto_compressed-w1024.webp',
                    'ninja-raccoon' => 'https://kto.kgp-cdn.com/kto/2023/11/20130404/Ganesha-Goldx-654d10095743c-kto_compressed-w1024.webp',
                    'lucky-clover' => 'https://kto.kgp-cdn.com/kto/2023/11/20130420/Double-Fortunex-654d10005d794-kto_compressed-w1024.webp',
                    'ultimate-striker' => 'https://kto.kgp-cdn.com/kto/2023/11/20130412/Fortune-Mousex--654d10038be41-kto_compressed-w1024.webp',
                    'three-cz-ds' => 'https://kto.kgp-cdn.com/kto/2023/11/20131129/bikini-paradisex-654d0e612a4b8-kto_compressed-w1024.webp',
                ];
            @endphp

            @foreach ($this->games as $index => $game)
                <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col" style="height: 500px;">
                    <!-- Status indicator - Bolinha verde no topo -->
                    <div class="absolute top-3 right-3 z-20">
                        <div class="flex items-center space-x-1 bg-black/20 backdrop-blur-sm rounded-full px-2 py-1">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse shadow-lg"></div>
                            <span class="text-xs text-white font-medium">Online</span>
                        </div>
                    </div>

                    <!-- Game number badge -->
                    <div class="absolute top-3 left-3 z-20">
                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg">
                            #{{ $index + 1 }}
                        </div>
                    </div>

                    <!-- Game image -->
                    <div class="relative flex-shrink-0" style="height: 240px;">
                        <img 
                            src="{{ $gameImages[$game['name']] ?? 'https://via.placeholder.com/300x200/6366f1/ffffff?text=Game' }}" 
                            alt="{{ ucwords(str_replace('-', ' ', $game['name'])) }}"
                            class="w-full h-full object-cover object-center transition-transform duration-300 group-hover:scale-110"
                            loading="lazy"
                            style="max-height: 240px; min-height: 240px;"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    </div>

                    <!-- Game info -->
                    <div class="flex-1 flex flex-col justify-between p-4">
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors truncate">
                                {{ ucwords(str_replace('-', ' ', $game['name'])) }}
                            </h3>
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Código:</span>
                                    <span class="font-mono text-sm bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded-md font-bold text-blue-600 dark:text-blue-400">
                                        {{ $game['case'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2 inline-block"></div>
                                    Ativo
                                </span>
                                <div class="flex items-center space-x-1 text-xs text-gray-500 dark:text-gray-400">
                                    <span>24/7</span>
                                </div>
                            </div>
                        </div>
                        <button
                            type="button"
                            onclick="copyGameCode({{ $game['case'] }}, '{{ $game['name'] }}', this)"
                            class="w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2 mt-auto"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            <span>Copiar Código</span>
                        </button>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-purple-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                </div>
            @endforeach
        </div>

        <!-- Footer info -->
        <div class="mt-12 text-center">
            <div class="inline-flex items-center space-x-3 px-6 py-3 bg-gray-50 dark:bg-gray-800 rounded-full shadow-md">
                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse shadow-lg"></div>
                <span class="text-sm text-gray-600 dark:text-gray-400 font-medium">
                    Todos os jogos estão funcionando perfeitamente
                </span>
                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse shadow-lg"></div>
            </div>
        </div>
    </div>

    <!-- Toast notification -->
    <div id="toast" class="fixed top-4 right-4 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="bg-green-500 text-white px-6 py-4 rounded-xl shadow-xl flex items-center space-x-3">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span id="toast-message" class="font-medium">Código copiado!</span>
        </div>
    </div>

    <script>
        function copyGameCode(code, gameName, button) {
            button.classList.add('animate-pulse');
            
            navigator.clipboard.writeText(code).then(function() {
                showToast('Código ' + code + ' copiado!');
                
                setTimeout(function() {
                    button.classList.remove('animate-pulse');
                }, 300);
                
                const originalText = button.innerHTML;
                button.innerHTML = '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="ml-2">Copiado!</span>';
                button.style.background = 'linear-gradient(to right, #10b981, #059669)';
                
                setTimeout(function() {
                    button.innerHTML = originalText;
                    button.style.background = '';
                }, 2000);
                
            }, function(err) {
                console.error('Erro ao copiar: ', err);
                showToast('Erro ao copiar código!', 'error');
            });
        }

        function showToast(message, type) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            
            toastMessage.textContent = message;
            
            const toastContainer = toast.querySelector('div');
            if (type === 'error') {
                toastContainer.className = toastContainer.className.replace('bg-green-500', 'bg-red-500');
            } else {
                toastContainer.className = toastContainer.className.replace('bg-red-500', 'bg-green-500');
            }
            
            toast.classList.remove('translate-x-full');
            
            setTimeout(function() {
                toast.classList.add('translate-x-full');
            }, 3000);
        }
    </script>

    <style>
        .group {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .group:hover {
            transform: translateY(-8px);
        }
        img {
            transition: opacity 0.3s ease;
        }
        img:not([src]) {
            opacity: 0;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</x-filament-panels::page>