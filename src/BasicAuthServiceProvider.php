<?php

namespace TecBeast\BasicAuthWithEnv;

use Illuminate\Support\ServiceProvider;

class BasicAuthServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/basic-auth.php' => config_path('basic-auth.php'),
        ]);
    }
}
