<?php

namespace App\Providers;

use App\Project\Evaluation;
use Route;
use App\User;
use App\Task\Task;
use App\Todo\Todo;
use App\Task\SubTask;
use App\Notice\Notice;
use App\Task\TaskType;
use App\Wiki\WikiType;
use App\Task\TaskGroup;
use App\Project\Project;
use App\Task\TaskStatus;
use App\Task\TaskActivity;
use App\Task\TaskPriority;
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
    protected $apiNamespace = 'App\Http\Controllers\Api';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        Route::model('user', User::class);
        Route::model('project', Project::class);
        Route::model('todo', Todo::class);
        Route::model('wikiType', WikiType::class);
        Route::model('taskType', TaskType::class);
        Route::model('taskPriority', TaskPriority::class);
        Route::model('taskStatus', TaskStatus::class);
        Route::model('taskGroup', TaskGroup::class);
        Route::model('task', Task::class);
        Route::model('subTask', SubTask::class);
        Route::model('taskActivity', TaskActivity::class);
        Route::model('notice', Notice::class);
        Route::model('evaluation', Evaluation::class);

        // ngrok.io Hack
        $scheme = "";
        $host = "";
        $baseInfo = parse_url(config("app.url"));
        $baseHost = $baseInfo["host"];
        $baseScheme = $baseInfo["scheme"];

        if (isset($_SERVER["HTTP_X_ORIGINAL_HOST"])) {
            $scheme = isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) ? $_SERVER["HTTP_X_FORWARDED_PROTO"] : $baseScheme;
            $host = isset($_SERVER["HTTP_X_ORIGINAL_HOST"]) ? $_SERVER["HTTP_X_ORIGINAL_HOST"] : "";
        } elseif (isset($_SERVER["HTTP_REFERER"])) {
            $info = parse_url($_SERVER["HTTP_REFERER"]);
            $host = $info["host"];
            $scheme = $info["scheme"];
        }

        if ($host != "" && $host != $baseHost && preg_match("#ngrok\.io#", $host)) {
            $scheme ?: $baseScheme;
            \URL::forceRootUrl("{$scheme}://{$host}");
        }
        // End ngrok.io Hack
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
            ->namespace($this->apiNamespace)
            ->group(base_path('routes/api.php'));
    }
}
