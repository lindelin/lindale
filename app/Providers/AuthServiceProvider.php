<?php

namespace App\Providers;

use Carbon\Carbon;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * TODO: 系统发布之前要重新编写授权策略。
     *
     * @var array
     */
    protected $policies = [
        'App\Project\Project' => 'App\Policies\ProjectPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Todo\Todo' => 'App\Policies\TodoPolicy',
        'App\Todo\TodoList' => 'App\Policies\TodoListPolicy',
        'App\Task\Task' => 'App\Policies\TaskPolicy',
        'App\Task\TaskActivity' => 'App\Policies\TaskActivityPolicy',
        'App\Wiki\Wiki' => 'App\Policies\WikiPolicy',
        'App\Notice\Notice' => 'App\Policies\NoticePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(Carbon::now()->addDays(15));

        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }
}
