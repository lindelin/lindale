<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use KgBot\LaravelLocalization\Facades\ExportLocalizations;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer( 'common.lang_support', function ($view) {
            return $view->with( [
                'messages' => ExportLocalizations::export()->toFlat(),
            ]);
        });
    }
}
