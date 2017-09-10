<?php

namespace App\Http\Controllers\Project\Task;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Task\Task;
use App\Project\Project;
use App\Task\TaskActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskActivityController extends Controller
{
    /**
     * 任务资源库.
     * @var TaskRepositoryContract
     */
    protected $taskRepository;

    /**
     * 构造器
     * 注入资源.
     *
     * TaskGroupController constructor.
     * @param TaskRepositoryContract $taskRepository
     */
    public function __construct(TaskRepositoryContract $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * 发表动态
     *
     * @param Request $request
     * @param Project $project
     * @param Task $task
     * @return mixed
     */
    public function store(Request $request, Project $project, Task $task)
    {
        $this->authorize('update', [$task, $project]);

        $activity = $this->taskRepository->CreateTaskActivity($request, $task);

        return response()->save($activity->save());
    }

    /**
     * 删除动态
     *
     * @param Project $project
     * @param Task $task
     * @param TaskActivity $taskActivity
     * @return mixed
     */
    public function destroy(Project $project, Task $task, TaskActivity $taskActivity)
    {
        $this->authorize('delete', [$taskActivity, $task, $project]);

        return response()->delete($taskActivity->delete());
    }
}
