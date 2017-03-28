<?php

namespace App\Http\Controllers\Project\Task;

use App\Task\Task;
use App\Project\Project;
use App\Task\TaskActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskActivityController extends Controller
{
    /**
     * 任务资源库.
     *
     * @var TaskRepository
     */
    protected $taskRepository;

    /**
     * 构造器
     * 注入资源.
     *
     * TaskGroupController constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
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
        $activity = $this->taskRepository->CreateTaskActivity($request, $task);

        $result = $activity->save();

        if ($result) {
            return redirect()->to('project/'.$project->id.'/task/show/'.$task->id)->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
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
        $this->authorize('delete', $taskActivity);

        if ($taskActivity->delete()) {
            return redirect()->to('project/'.$project->id.'/task/show/'.$task->id)->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
