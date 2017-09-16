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

        // Project Repository
        $this->app->bind(
            'App\Contracts\Repositories\ProjectRepositoryContract',
            'App\Repositories\ProjectRepository'
        );

        // Task Repository
        $this->app->bind(
            'App\Contracts\Repositories\TaskRepositoryContract',
            'App\Repositories\TaskRepository'
        );

        // To-do Repository
        $this->app->bind(
            'App\Contracts\Repositories\TodoRepositoryContract',
            'App\Repositories\TodoRepository'
        );

        // User Repository
        $this->app->bind(
            'App\Contracts\Repositories\UserRepositoryContract',
            'App\Repositories\UserRepository'
        );

        // WIKI Repository
        $this->app->bind(
            'App\Contracts\Repositories\WikiRepositoryContract',
            'App\Repositories\WikiRepository'
        );

        // WIKI Repository
        $this->app->bind(
            'App\Contracts\Repositories\AchievementRepositoryContract',
            'App\Repositories\AchievementRepository'
        );
    }
}
