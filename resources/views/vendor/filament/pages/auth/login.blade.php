<x-filament-panels::page.simple>
    @php
        use App\Models\Setting;
        use Illuminate\Support\Facades\Storage;

        $logoPathSetting = Setting::where('key', 'logo_path')->first();
        $logoUrl = $logoPathSetting ? Storage::url($logoPathSetting->value) : null;
    @endphp

    @if ($logoUrl)
        <div class="mb-6 flex justify-center">
            <img src="{{ $logoUrl }}" alt="Application Logo" class="h-16 drop-shadow-lg rounded-lg">
        </div>
    @endif

    @if (filament()->hasRegistration())
        <x-slot name="subheading">
            {{ __('filament-panels::pages/auth/login.actions.register.before') }}

            {{ $this->registerAction }}
        </x-slot>
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

    <x-filament-panels::form id="form" wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}
</x-filament-panels::page.simple>