<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Models\Setting; // Import the Setting model

class AppSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $view = 'filament.pages.app-settings';

    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $navigationLabel = 'Geral';

    protected static ?string $title = 'Configurações Gerais';

    public static function canAccess(): bool
    {
        return auth()->user() instanceof \App\Models\Admin;
    }

    public array $data = []; // Form data will be bound to this property

    public function mount(): void
    {
        // Load settings from the database
        $app_name_setting = Setting::where('key', 'app_name')->first();
        $logo_path_setting = Setting::where('key', 'logo_path')->first();

        $this->data['app_name'] = $app_name_setting ? $app_name_setting->value : env('APP_NAME');
        
        // Ensure logo is an array for FileUpload component
        $this->data['logo'] = $logo_path_setting && is_string($logo_path_setting->value) 
                                ? [$logo_path_setting->value] 
                                : [];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('app_name')
                    ->label('Nome da Aplicação')
                    ->required(),
                FileUpload::make('logo')
                    ->label('Logo da Aplicação')
                    ->image()
                    ->directory('images') // Store in public/images
                    ->disk('public') // Use the 'public' disk
                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/gif', 'image/svg+xml'])
                    ->maxSize(1024) // 1MB max
                    ->preserveFilenames() // Keep original filename
                    ->enableDownload()
                    ->enableOpen(),
            ])
            ->statePath('data'); // Important for Livewire forms
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Save app_name to the database
        Setting::updateOrCreate(
            ['key' => 'app_name'],
            ['value' => $data['app_name']]
        );

        // Update APP_NAME in .env (for consistency, though DB is primary)
        $envPath = base_path('.env');
        if (File::exists($envPath)) {
            $contents = File::get($envPath);
            $newContents = preg_replace('/^APP_NAME=.*$/m', 'APP_NAME="' . $data['app_name'] . '"', $contents);
            File::put($envPath, $newContents);
        }

        // Handle logo path for database storage
        $logoPathToSave = null;
        if (is_array($data['logo']) && !empty($data['logo'])) {
            // If a new file was uploaded, $data['logo'] will be an array of paths.
            // We take the first one (assuming single file upload).
            $logoPathToSave = $data['logo'][0];
        } elseif (is_string($data['logo'])) {
            // If no new file was uploaded, but there was an existing one,
            // $data['logo'] might be the string path of the existing file.
            $logoPathToSave = $data['logo'];
        }

        Setting::updateOrCreate(
            ['key' => 'logo_path'],
            ['value' => $logoPathToSave]
        );

        Notification::make()
            ->title('Configurações salvas com sucesso!')
            ->success()
            ->send();

        // Clear config cache to reflect .env changes
        Artisan::call('config:clear');
    }
}
