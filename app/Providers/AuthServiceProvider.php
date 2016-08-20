<?php

namespace App\Providers;

use App\Article;
use App\Policies\ArticlePolicy;
use App\Policies\TaskPolicy;
use App\Policies\UaerPolicy;
use App\Task\Task;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model'    => 'App\Policies\ModelPolicy',
        Task::class    => TaskPolicy::class,
        User::class    => UaerPolicy::class,
        Article::class => ArticlePolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
