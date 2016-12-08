<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project\Project;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * 任务资源库
     *
     * @var TaskRepository
     */
    protected $taskRepository;

    /**
     * 构造器
     * 注入资源
     *
     * TaskGroupController constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Index
     *
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.task.index', $this->taskRepository->TaskGroupResources($project))
            ->with(['project' => $project, 'selected' => 'tasks']);
    }
}
