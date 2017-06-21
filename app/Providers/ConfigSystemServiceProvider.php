<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigSystemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\System\Contracts\ConfigSystem\ProjectConfigSystemContract::class,
            \App\System\ConfigSystem\ProjectConfigSystem::class
        );

        $this->app->bind(
            \App\System\Contracts\ConfigSystem\UserConfigSystemContract::class,
            \App\System\ConfigSystem\UserConfigSystem::class
        );
    }
}
