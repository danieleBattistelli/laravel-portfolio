<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // Metodo per registrare i servizi dell'applicazione
    public function register(): void {}

    // Metodo per eseguire il bootstrap di qualsiasi servizio necessario
    public function boot(): void {}
}
