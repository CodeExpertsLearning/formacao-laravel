<?php

namespace App\Providers;

use App\Services\My;
use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // echo "Hi";
        // die();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('My', function(){
           return new My("Registrando");
        });
    }
}
