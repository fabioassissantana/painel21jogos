<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class AdminAuthLogin extends BaseLogin
{
    protected static string $view = 'filament.auth.admin-login';
}