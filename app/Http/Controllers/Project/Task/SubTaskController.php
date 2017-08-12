<?php

namespace App\Http\Controllers\Project\Task;

use App\Task\Task;
use App\Task\SubTask;
use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Events\Task\SubTask\SubTaskCreated;
use App\Events\Task\SubTask\SubTaskDeleted;
use App\Events\Task\SubTask\SubTaskUpdated;

class SubTaskController extends Controller
{
    /**
     * 任务资源库.
     *
     * @var TaskRepository
     */
    protected $taskRepository;

    /**
     * 构造器
     * 注�
     * �资源.
     *
     * TaskGroupController constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * 附属任务添加
     * TODO: 代码解耦.
     *
     * @param Request $request
     * @param Project $project
     * @param Task $task
     * @return mixed
     */
    public function store(Request $request, Project $project, Task $task)
    {
        if ($task->is_finish === config('task.unfinished')) {
            $this->validate($request, [
                'content' => 'required|max:30',
            ]);

            $subTask = new SubTask();
            $subTask->content = $request->get('content');
            $subTask->task_id = $task->id;

            $result = $subTask->save();

            if ($result) {
                event(new SubTaskCreated($subTask, $request->user()));

                return redirect()->to('project/'.$project->id.'/task/show/'.$task->id)->with('status', trans('errors.update-succeed'));
            } else {
                return redirect()->back()->withErrors(trans('errors.update-failed'));
            }
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
        $subTask = $this->taskRepository->UpdateSubTask($request, $subTask);

        $result = $subTask->update();

        if ($result) {
            event(new SubTaskUpdated($subTask, $request->user()));

            return redirect()->to('project/'.$project->id.'/task/show/'.$task->id)->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    /**
     * 附属任务删除.
     *
     * @param Project $project
     * @param Task $task
     * @param SubTask $subTask
     * @param Request $request
     * @return mixed
     */
    public function destroy(Project $project, Task $task, SubTask $subTask, Request $request)
    {
        $result = $subTask->delete();

        if ($result) {
            event(new SubTaskDeleted($subTask, $request->user()));

            return redirect()->to('project/'.$project->id.'/task/show/'.$task->id)->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
