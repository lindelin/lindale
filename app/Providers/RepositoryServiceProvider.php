<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        // Admin Repository
        $this->app->bind(
            'App\Contracts\Repositories\AdminRepositoryContract',
            'App\Repositories\AdminRepository'
        );

        // Member Repository
        $this->app->bind(
            'App\Contracts\Repositories\MemberRepositoryContract',
            'App\Repositories\MemberRepository'
        );

        // Notice Repository
        $this->app->bind(
            'App\Contracts\Repositories\NoticeRepositoryContract',
            'App\Repositories\NoticeRepository'
        );

        // Progress Repository
        $this->app->bind(
            'App\Contracts\Repositories\ProgressRepositoryContract',
            'App\Repositories\ProgressRepository'
        );
    }
}
