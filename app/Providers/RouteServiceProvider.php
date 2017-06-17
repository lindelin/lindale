<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        Route::model('user', \App\User::class);
        Route::model('project', \App\Project\Project::class);
        Route::model('todo', \App\Todo\Todo::class);
        Route::model('wikiType', \App\Wiki\WikiType::class);
        Route::model('taskType', \App\Task\TaskType::class);
        Route::model('taskPriority', \App\Task\TaskPriority::class);
        Route::model('taskStatus', \App\Task\TaskStatus::class);
        Route::model('taskGroup', \App\Task\TaskGroup::class);
        Route::model('task', \App\Task\Task::class);
        Route::model('subTask', \App\Task\SubTask::class);
        Route::model('taskActivity', \App\Task\TaskActivity::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
