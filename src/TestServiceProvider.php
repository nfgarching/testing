<?php

namespace Nfgarching\Testing;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd('Nfgarching\Testing\Providers\TestProvider.php');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'inspire');


        $this->publishes([
            __DIR__.'/../config/testing.php' => config_path('testing.php'),
        ]);        

    }

}
