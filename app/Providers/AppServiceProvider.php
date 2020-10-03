<?php

namespace App\Providers;

use App\Fattura;
use App\Observers\FatturaObserver;
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
        Fattura::observe(FatturaObserver::class);
    }
}
