<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
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
        $this->app->singleton('admin', function () {
            return $this->app->make(\App\Policies\AdminPolicy::class);
        });

        $this->app->singleton('icon', function () {
            return $this->app->make(\App\Tools\Html\IconTool::class);
        });
    }
}
