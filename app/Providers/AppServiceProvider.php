<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Arregla problemas de longitud de índices en versiones de MySQL anteriores a la 5.7.7.
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }
}
