<x-filament-panels::auth.layout>
    @php
        $logoPath = \App\Models\Setting::where('key', 'logo_path')->first();
        $logoUrl = $logoPath ? \Illuminate\Support\Facades\Storage::url($logoPath->value) : null;
    @endphp

    @if ($logoUrl)
        <div class="mb-4 flex justify-center">
            <img src="{{ $logoUrl }}" alt="{{ config('app.name') }} Logo" class="h-20">
        </div>
    @endif

    {{ $slot }}
</x-filament-panels::auth.layout>