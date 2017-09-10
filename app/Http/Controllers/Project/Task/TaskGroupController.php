<?php

namespace App\Http\Controllers\Project\Task;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Task\TaskGroup;
use App\Project\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskGroupRequest;

class TaskGroupController extends Controller
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
     * 创建任务组.
     *
     * @param Project $project
     * @return mixed
     */
    public function create(Project $project)
    {
        return view('project.task.group.create', $this->taskRepository->TaskGroupCreateResources($project))
            ->with(['project' => $project, 'selected' => 'tasks']);
    }

    /**
     * 更新任务组.
     *
     * @param Project $project
     * @param TaskGroup $group
     * @return mixed
     */
    public function edit(Project $project, TaskGroup $group)
    {
        $this->authorize('update', [$group, $project]);
        return view('project.task.group.edit', $this->taskRepository->TaskGroupCreateResources($project))
            ->with(['project' => $project, 'selected' => 'tasks'])
            ->with(compact('group'));
    }

    /**
     * 保存任务组.
     *
     * @param TaskGroupRequest $request
     * @param Project $project
     * @return mixed
     */
    public function store(TaskGroupRequest $request, Project $project)
    {
        $group = $this->taskRepository->CreateGroup($request, $project);

        $this->authorize('create', [$group, $project]);

        if ($group->save()) {
            return redirect()->to('project/'.$project->id.'/task')->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    /**
     * 更新任务组.
     *
     * @param TaskGroupRequest $request
     * @param Project $project
     * @param TaskGroup $group
     * @return mixed
     */
    public function update(TaskGroupRequest $request, Project $project, TaskGroup $group)
    {
        $this->authorize('update', [$group, $project]);
        if ($this->taskRepository->UpdateGroup($request, $group)->update()) {
            return redirect()->to('project/'.$project->id.'/task')->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    /**
     * 删除任务组.
     *
     * @param Project $project
     * @param TaskGroup $group
     * @return mixed
     */
    public function destroy(Project $project, TaskGroup $group)
    {
        $this->authorize('update', [$group, $project]);
        if ($group->delete()) {
            return redirect()->to(route('task.index', compact('project')))->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
