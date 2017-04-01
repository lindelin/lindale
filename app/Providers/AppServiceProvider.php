<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Closure;
use Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $middlewareClosure = function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        };
        view()->composer('admin.index', function ($view) use ($middlewareClosure){
            $view->with([
                'routes' => Route::getRoutes(),
                'middlewareClosure' => $middlewareClosure
            ]);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
