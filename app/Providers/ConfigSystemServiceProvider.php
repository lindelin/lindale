<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\System\ConfigSystem\UserConfigSystem;
use App\System\ConfigSystem\ProjectConfigSystem;
use App\System\Contracts\ConfigSystem\UserConfigSystemContract;
use App\System\Contracts\ConfigSystem\ProjectConfigSystemContract;

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
            ProjectConfigSystemContract::class,
            ProjectConfigSystem::class
        );

        $this->app->bind(
            UserConfigSystemContract::class,
            UserConfigSystem::class
        );

        $this->app->singleton('pcs', function () {
            return $this->app->make(ProjectConfigSystemContract::class);
        });

        $this->app->singleton('ucs', function () {
            return $this->app->make(UserConfigSystemContract::class);
        });
    }
}
