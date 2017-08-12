<?php

namespace App\Http\Controllers\Project;

use App\Task\Task;
use App\Task\TaskType;
use App\Project\Project;
use App\Task\TaskStatus;
use App\Task\TaskPriority;
use Illuminate\Http\Request;
use App\Events\Task\TaskCreated;
use App\Events\Task\TaskDeleted;
use App\Events\Task\TaskUpdated;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
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
     * Index.
     *
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.task.index', $this->taskRepository->TaskGroupResources($project))
            ->with(['project' => $project, 'selected' => 'tasks', 'mode' => 'group', 'in' => 'menu']);
    }

    /**
     * All Tasks.
     *
     * @param Project $project
     * @return mixed
     */
    public function all(Project $project)
    {
        return view('project.task.task', $this->taskRepository->TaskResources($project))
            ->with(['project' => $project, 'selected' => 'tasks', 'mode' => 'all', 'in' => 'menu']);
    }

    /**
     * 未完成任务
     *
     * @param Project $project
     * @return mixed
     */
    public function unfinished(Project $project)
    {
        return view('project.task.task', $this->taskRepository->TaskResources($project, config('task.unfinished')))
            ->with(['project' => $project, 'selected' => 'tasks', 'mode' => 'unfinished', 'in' => 'menu']);
    }

    /**
     * 已完成.
     *
     * @param Project $project
     * @return mixed
     */
    public function finished(Project $project)
    {
        return view('project.task.task', $this->taskRepository->TaskResources($project, config('task.finished')))
            ->with(['project' => $project, 'selected' => 'tasks', 'mode' => 'finished', 'in' => 'menu']);
    }

    /**
     * 按任务类型.
     *
     * @param Project $project
     * @param TaskType $type
     * @return mixed
     */
    public function type(Project $project, TaskType $type)
    {
        return view('project.task.task', $this->taskRepository->TaskResources($project, null, $type))
            ->with(['project' => $project, 'selected' => 'tasks', 'mode' => 'type'.$type->id, 'in' => 'type']);
    }

    /**
     * 按任务优�
     * �度.
     *
     * @param Project $project
     * @param TaskPriority $priority
     * @return mixed
     */
    public function priority(Project $project, TaskPriority $priority)
    {
        return view('project.task.task', $this->taskRepository->TaskResources($project, null, null, $priority))
            ->with(['project' => $project, 'selected' => 'tasks', 'mode' => 'priority'.$priority->id, 'in' => 'priority']);
    }

    /**
     * 按任务状态
     *
     * @param Project $project
     * @param TaskStatus $status
     * @return mixed
     */
    public function status(Project $project, TaskStatus $status)
    {
        return view('project.task.task', $this->taskRepository->TaskResources($project, null, null, null, $status))
            ->with(['project' => $project, 'selected' => 'tasks', 'mode' => 'status'.$status->id, 'in' => 'status']);
    }

    /**
     * 创建任务表单.
     *
     * @param Project $project
     * @return mixed
     */
    public function create(Project $project)
    {
        return view('project.task.create', $this->taskRepository->TaskCreateResources($project))
            ->with(['project' => $project, 'selected' => 'tasks']);
    }

    /**
     * 编辑任务
     *
     * @param Project $project
     * @param Task $task
     * @return mixed
     */
    public function edit(Project $project, Task $task)
    {
        if ($task->is_finish === config('task.unfinished')) {
            return view('project.task.edit', $this->taskRepository->TaskCreateResources($project))
                ->with(['project' => $project, 'selected' => 'tasks'])
                ->with(compact('task'));
        } else {
            return redirect()->back()->withErrors(trans('errors.can-not-edit-task'));
        }
    }

    /**
     * 创建任务
     *
     * @param TaskRequest $request
     * @param Project $project
     * @return mixed
     */
    public function store(TaskRequest $request, Project $project)
    {
        $task = $this->taskRepository->CreateTask($request, $project);

        $this->authorize('create', [$task, $project]);

        $result = $task->save();

        if ($result) {
            event(new TaskCreated($task, $request->user()));

            return redirect()->to('project/'.$project->id.'/task/show/'.$task->id)
                ->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    /**
     * 更新任务
     *
     * @param TaskRequest $request
     * @param Project $project
     * @param Task $task
     * @return mixed
     */
    public function update(TaskRequest $request, Project $project, Task $task)
    {
        $this->authorize('update', [$task, $project]);

        if ($task->is_finish === config('task.unfinished') or (int) $request->get('is_finish') === config('task.unfinished')) {
            $task = $this->taskRepository->UpdateTask($request, $task);

            $result = $task->update();

            if ($result) {
                event(new TaskUpdated($task, $request->user()));

                return redirect()->to('project/'.$project->id.'/task/show/'.$task->id)->with('status', trans('errors.update-succeed'));
            } else {
                return redirect()->back()->withErrors(trans('errors.update-failed'));
            }
        } else {
            return redirect()->back()->withErrors(trans('errors.can-not-edit-task'));
        }
    }

    /**
     * 任务详�
     * .
     *
     * @param Project $project
     * @param Task $task
     * @return mixed
     */
    public function show(Project $project, Task $task)
    {
        return view('project.task.show', $this->taskRepository->TaskShowResources($project, $task))
            ->with(compact('project', 'task'))
            ->with(['selected' => 'tasks']);
    }

    /**
     * 删除任务.
     *
     * @param Project $project
     * @param Task $task
     * @param Request $request
     * @return mixed
     */
    public function destroy(Project $project, Task $task, Request $request)
    {
        if ($task->is_finish === config('task.unfinished')) {
            $this->authorize('delete', [$task, $project]);

            if ($task->delete()) {
                event(new TaskDeleted($task, $request->user()));

                return redirect()->to('project/'.$project->id.'/task')->with('status', trans('errors.delete-succeed'));
            } else {
                return redirect()->back()->withErrors(trans('errors.delete-failed'));
            }
        } else {
            return redirect()->back()->withErrors(trans('errors.can-not-delete-task'));
        }
    }
}
