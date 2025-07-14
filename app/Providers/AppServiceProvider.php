<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set timezone PHP
        date_default_timezone_set(env('APP_TIMEZONE', 'Asia/Jakarta'));

        // Set locale Carbon (bahasa)
        Carbon::setLocale('id');

        // Atur timezone Laravel config
        Config::set('app.timezone', env('APP_TIMEZONE', 'Asia/Jakarta'));
    }
}
