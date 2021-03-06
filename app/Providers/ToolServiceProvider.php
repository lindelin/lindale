<?php

namespace App\Providers;

use App\Services\ApplePushNotificationService;
use App\Tools\Analytics\GraphTool;
use App\Tools\Html\IconTool;
use App\Policies\AdminPolicy;
use App\Tools\Analytics\Counter;
use App\Tools\Analytics\Calculator;
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
            return $this->app->make(AdminPolicy::class);
        });

        $this->app->singleton('icon', function () {
            return $this->app->make(IconTool::class);
        });

        $this->app->singleton('markdown', function () {
            return $this->app->make(\ParsedownExtra::class);
        });

        $this->app->singleton('counter', function () {
            return $this->app->make(Counter::class);
        });

        $this->app->singleton('calculator', function () {
            return $this->app->make(Calculator::class);
        });

        $this->app->singleton('graphTool', function () {
            return $this->app->make(GraphTool::class);
        });

        $this->app->singleton('fcm', function () {
            return $this->app->make(ApplePushNotificationService::class);
        });
    }
}
