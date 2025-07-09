<div class="fi-auth-page flex bg-gray-100 !p-0 dark:bg-gray-900">
    <div class="fi-auth-card w-full max-w-md rounded-xl bg-white px-4 pb-0 shadow-2xl dark:bg-gray-900 pt-0 !mt-0">
        @php
            $logoPath = \App\Models\Setting::where('key', 'logo_path')->first();
            $logoUrl = $logoPath ? \Illuminate\Support\Facades\Storage::url($logoPath->value) : null;
        @endphp

        @if ($logoUrl)
            <div class="flex justify-center">
                <img src="{{ $logoUrl }}" alt="{{ config('app.name') }} Logo" class="h-24">
            </div>
        @endif

        <form wire:submit.prevent="authenticate">
            <div class="mb-4">
                {{ $this->form }}
            </div>

            <x-filament::button type="submit" class="w-full mt-4">
                {{ __('filament-panels::pages/auth/login.form.actions.authenticate.label') }}
            </x-filament::button>
        </form>
    </div>
</div>