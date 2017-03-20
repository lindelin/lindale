<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\System\ConfigSystem\ProjectConfigSystem;
use App\Task\TaskStatus;
use App\Task\TaskType;
use App\Repositories\ProjectRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProjectConfig;

class ConfigController extends Controller
{
    /**
     * 项目资源库.
     *
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * 项目配置系统
     *
     * @var ProjectConfigSystem
     */
    protected $configSystem;

    /**
     * 构造器
     * 通过DI获取项目资源库.
     *
     * ConfigController constructor.
     * @param ProjectRepository $projectRepository
     * @param ProjectConfigSystem $projectConfigSystem
     */
    public function __construct(ProjectRepository $projectRepository, ProjectConfigSystem $projectConfigSystem)
    {
        $this->projectRepository = $projectRepository;
        $this->configSystem = $projectConfigSystem;
    }

    /*
    |--------------------------------------------------------------------------
    | 基本设定
    |--------------------------------------------------------------------------
    */

    /**
     * 基本设定
     *
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.config.index', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'basic']);
    }

    /*
    |--------------------------------------------------------------------------
    | 语言和地区设定
    |--------------------------------------------------------------------------
    */

    /**
     * 语言和地区
     *
     * @param Project $project
     * @return mixed
     */
    public function locale(Project $project)
    {
        return view('project.config.locale', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'locale']);
    }

    /**
     * 语言和地区更新
     *
     * @param Request $request
     * @param Project $project
     * @return mixed
     */
    public function updateLocale(Request $request, Project $project)
    {
        $this->authorize('member', [$project]);

        $result = $this->configSystem->setConfigInfo($project, ProjectConfig::LANG, $request->get(ProjectConfig::LANG));

        return response()->update($result);
    }

    /*
    |--------------------------------------------------------------------------
    | 通知设定
    |--------------------------------------------------------------------------
    */

    /**
     * 通知
     *
     * @param Project $project
     * @return mixed
     */
    public function notification(Project $project)
    {
        return view('project.config.notification', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'notification']);
    }

    /**
     * Slack通知更新
     *
     * @param Request $request
     * @param Project $project
     * @return mixed
     */
    public function updateNotification(Request $request, Project $project)
    {
        $this->authorize('member', [$project]);

        $result1 = $this->configSystem->setConfigInfo($project, ProjectConfig::SLACK_NOTIFICATION_NO, $request->get(ProjectConfig::SLACK_NOTIFICATION_NO));
        $result2 = $this->configSystem->setConfigInfo($project, ProjectConfig::SLACK_API_KEY, $request->get(ProjectConfig::SLACK_API_KEY));

        return response()->update($result1 and $result2);
    }

    public function taskType(Project $project)
    {
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

    public function updateTaskType(Request $request, Project $project, $id = null)
    {
        $result = TaskType::updateOrCreate(
            ['id' => $id, 'project_id' => $project->id],
            ['name' => $request->get('name'), 'color_id' => $request->get('color_id')]);

        return response()->update($result);
    }

    public function taskStatus(Project $project)
    {
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

    public function updateTaskStatus(Request $request, Project $project, $id = null)
    {
        $result = TaskStatus::updateOrCreate(
            ['id' => $id, 'project_id' => $project->id],
            ['name' => $request->get('name'), 'color_id' => $request->get('color_id'), 'action_id' => 3]);/* TODO: ACTION */

        return response()->update($result);
    }
}
