<?php

namespace App\Http\Controllers\Project;

use App\Contracts\Repositories\ProjectRepositoryContract;
use App\Task\TaskType;
use App\Project\Project;
use App\Task\TaskStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\System\Contracts\ConfigSystem\ProjectConfigSystemContract;

class ConfigController extends Controller
{
    /**
     * 项目资源库.
     * @var ProjectRepositoryContract
     */
    protected $projectRepository;

    /**
     * 项目配置系统
     *
     * @var ProjectConfigSystemContract
     */
    protected $configSystem;

    /**
     * 构造器
     * 通过DI获取项目资源库.
     *
     * ConfigController constructor.
     * @param ProjectRepositoryContract $projectRepository
     * @param ProjectConfigSystemContract $configSystem
     */
    public function __construct(ProjectRepositoryContract $projectRepository, ProjectConfigSystemContract $configSystem)
    {
        $this->projectRepository = $projectRepository;
        $this->configSystem = $configSystem;
    }

    /*
    |--------------------------------------------------------------------------
    | 基本设定
    |--------------------------------------------------------------------------
    */

    /**
     * 基本设定.
     *
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        $this->authorize('member', [$project]);
        return view('project.config.index', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'basic']);
    }

    /*
    |--------------------------------------------------------------------------
    | 语言和地区设定
    |--------------------------------------------------------------------------
    */

    /**
     * 语言和地区.
     *
     * @param Project $project
     * @return mixed
     */
    public function locale(Project $project)
    {
        $this->authorize('member', [$project]);
        return view('project.config.locale', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'locale']);
    }

    /**
     * 语言和地区更新.
     *
     * @param Request $request
     * @param Project $project
     * @return mixed
     */
    public function updateLocale(Request $request, Project $project)
    {
        $this->authorize('member', [$project]);

        $result = $this->configSystem->set($project, config('config.project.lang'), $request->get(config('config.project.lang')));

        return response()->update($result);
    }

    /*
    |--------------------------------------------------------------------------
    | 通知设定
    |--------------------------------------------------------------------------
    */

    /**
     * 通知.
     *
     * @param Project $project
     * @return mixed
     */
    public function notification(Project $project)
    {
        $this->authorize('member', [$project]);
        return view('project.config.notification', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'notification']);
    }

    /**
     * Slack通知更新.
     *
     * @param Request $request
     * @param Project $project
     * @return mixed
     */
    public function updateNotification(Request $request, Project $project)
    {
        $this->authorize('member', [$project]);

        $result1 = $this->configSystem->set($project, config('config.project.slack'), $request->get(config('config.project.slack')));
        $result2 = $this->configSystem->set($project, config('config.project.key.slack'), $request->get(config('config.project.key.slack')));

        return response()->update($result1 and $result2);
    }

    /*
   　|--------------------------------------------------------------------------
  　 | 任务类型设定
  　 |--------------------------------------------------------------------------
   　*/

    /**
     * 任务类型
     * @param Project $project
     * @return mixed
     */
    public function taskType(Project $project)
    {
        $this->authorize('member', [$project]);
        $taskTypes = $project->TaskTypes;

        return view('project.config.common-type', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'taskType'])
            ->with([
                'models' => $taskTypes,
                'heading' => trans('config.task-type-config'),
                'list_title' => trans('task.type'),
                'add_url' => url('/project/'.$project->id.'/config/task/type/'),
                'edit_url' => url('/project/'.$project->id.'/config/task/type/'),
            ]);
    }

    /**
     * 任务类型设定
     * @param Request $request
     * @param Project $project
     * @param null $id
     * @return mixed
     */
    public function updateTaskType(Request $request, Project $project, $id = null)
    {
        $this->authorize('member', [$project]);
        $result = TaskType::updateOrCreate(
            ['id' => $id, 'project_id' => $project->id],
            ['name' => $request->get('name'), 'color_id' => $request->get('color_id')]);

        return response()->update($result);
    }

    /*
   　|--------------------------------------------------------------------------
  　 | 任务状态设定
  　 |--------------------------------------------------------------------------
   　*/

    /**
     * 任务状态设定
     * @param Project $project
     * @return mixed
     */
    public function taskStatus(Project $project)
    {
        $this->authorize('member', [$project]);
        $taskStatuses = $project->TaskStatuses;

        return view('project.config.common-type', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'taskStatus'])
            ->with([
                'models' => $taskStatuses,
                'heading' => trans('config.task-status-config'),
                'list_title' => trans('task.status'),
                'add_url' => url('/project/'.$project->id.'/config/task/status/'),
                'edit_url' => url('/project/'.$project->id.'/config/task/status/'),
            ]);
    }

    /**
     * 任务状态设定
     * @param Request $request
     * @param Project $project
     * @param null $id
     * @return mixed
     */
    public function updateTaskStatus(Request $request, Project $project, $id = null)
    {
        $this->authorize('member', [$project]);
        $result = TaskStatus::updateOrCreate(
            ['id' => $id, 'project_id' => $project->id],
            ['name' => $request->get('name'), 'color_id' => $request->get('color_id'), 'action_id' => 3]); /* TODO: 状态ACTION */

        return response()->update($result);
    }
}
