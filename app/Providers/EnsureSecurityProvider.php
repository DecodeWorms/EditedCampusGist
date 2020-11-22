<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\ExternalApiHelper;
use App\Helpers\CheckName;

class EnsureSecurityProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Helpers\ExternalApiHelper',function($app){
            return new ExternalApiHelper('olawale');

        });

        $this->app->bind('App\Helpers\CheckName',function($app){
            return new CheckName();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
