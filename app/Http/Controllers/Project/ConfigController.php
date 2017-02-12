<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\System\ConfigSystem\ProjectConfigSystem;
use App\Task\TaskType;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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

        if ($result) {
            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
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

        if ($result1 and $result2) {
            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    public function taskType(Project $project)
    {
        $taskTypes = TaskType::where('project_id', $project->id)->get();
        return view('project.config.task-type', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'taskType'])
            ->with($this->_taskTypeViewParam($taskTypes, trans('task.type').trans('config.config'), trans('task.type').trans('config.list')));
    }

    private function _taskTypeViewParam($models, $heading, $list_title)
    {
        return [
            'models' => $models,
            'heading' => $heading,
            'list_title' => $list_title,
        ];
    }
}
