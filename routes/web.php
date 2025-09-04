<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/export', [ExportController::class, 'export'])->name('export');

Route::post('/register', [TamuController::class, 'store'])->name('tamu.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/register', [TamuController::class, 'create'])->name('tamu.create');
    Route::post('/checkout/{id}', [TamuController::class, 'checkout'])->name('tamu.checkout');

    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::view('/user/registrasi', 'user.registrasi')->name('user.registrasi');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', [TamuController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/registrasi', [TamuController::class, 'create'])->name('admin.registrasi');
    Route::post('/admin/checkout/{id}', [TamuController::class, 'checkout'])->name('admin.checkout');
});

require __DIR__.'/auth.php';
