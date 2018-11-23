<?php

namespace App\Providers;

use App\Http\Connections\Connection;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class ConnectionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('connection', function ($app) {
            return new Connection(new Client());
        });
    }
}
