<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Closure;
use Route;

class RoutingManagementServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $middlewareClosure = function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        };
        view()->composer('layouts.admin.route-manager', function ($view) use ($middlewareClosure){
            $methodColours = [
                'GET' => 'success',
                'HEAD' => 'default',
                'POST' => 'primary',
                'PUT' => 'warning',
                'PATCH' => 'info',
                'DELETE' => 'danger'
            ];
            $view->with([
                'routes' => Route::getRoutes(),
                'middlewareClosure' => $middlewareClosure,
                'methodColours' => $methodColours,
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
