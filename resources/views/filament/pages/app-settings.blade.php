<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <x-filament::button type="submit" class="mt-4">
            Salvar Configurações
        </x-filament::button>
    </form>
</x-filament-panels::page>