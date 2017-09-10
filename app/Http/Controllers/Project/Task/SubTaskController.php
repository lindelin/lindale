<?php

namespace App\Http\Controllers\Project\Task;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Exceptions\StoreSubTaskException;
use App\Task\Task;
use App\Task\SubTask;
use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubTaskController extends Controller
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
     * 附属任务添加
     *
     * @param Request $request
     * @param Project $project
     * @param Task $task
     * @return mixed
     */
    public function store(Request $request, Project $project, Task $task)
    {
        $this->authorize('update', [$task, $project]);
        if ($task->is_finish === config('task.unfinished')) {
            $this->validate($request, ['contents' => 'required',]);
            return response()->save($this->taskRepository->createSubTask($request, $task));
        } else {
            return redirect()->back()->withErrors(trans('errors.can-not-add-sub-task'));
        }
    }

    /**
     * 附属任务更新.
     *
     * @param Request $request
     * @param Project $project
     * @param Task $task
     * @param SubTask $subTask
     * @return mixed
     */
    public function update(Request $request, Project $project, Task $task, SubTask $subTask)
    {
        $this->authorize('update', [$subTask, $task, $project]);
        return response()->update($this->taskRepository->UpdateSubTask($request, $subTask)->update());
    }

    /**
     * 附属任务删除.
     * @param Project $project
     * @param Task $task
     * @param SubTask $subTask
     * @return mixed
     */
    public function destroy(Project $project, Task $task, SubTask $subTask)
    {
        $this->authorize('delete', [$subTask, $task, $project]);
        return response()->delete($subTask->delete());
    }
}
