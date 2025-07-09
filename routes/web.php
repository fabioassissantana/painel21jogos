<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Setting; // Import the Setting model
use Illuminate\Support\Facades\Storage; // Import the Storage facade

Route::get('/', function () {
    $logoPath = Setting::where('key', 'logo_path')->first();
    $logoUrl = $logoPath ? Storage::url($logoPath->value) : null; // Get the URL for the logo

    return view('welcome', compact('logoUrl'));
});

// Rotas de otimização do painel admin
Route::middleware(['web', 'auth:admin'])->prefix('admin/otimizar')->name('admin.otimizar.')->group(function () {
    Route::post('/zerar-users', function () {
        DB::table('users')->where('isinfluencer', 0)->delete();
        return back()->with('success', 'Todos os users não influencers foram apagados!');
    })->name('zerar-users');

    Route::post('/zerar-spins', function () {
        DB::table('spins')->truncate();
        return back()->with('success', 'Todos os spins foram apagados!');
    })->name('zerar-spins');

    Route::post('/zerar-calls', function () {
        DB::table('calls')->truncate();
        return back()->with('success', 'Todas as calls foram apagadas!');
    })->name('zerar-calls');
});