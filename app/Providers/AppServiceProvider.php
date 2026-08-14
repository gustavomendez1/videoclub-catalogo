<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. Importa la clase URL
use Illuminate\Support\Facades\URL;

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
        // 2. Fuerza HTTPS si APP_ENV es 'production'
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
