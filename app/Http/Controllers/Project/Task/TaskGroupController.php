<?php

namespace App\Http\Controllers\Project\Task;

use App\Task\TaskGroup;
use App\Project\Project;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Http\Requests\TaskGroupRequest;

class TaskGroupController extends Controller
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

        $result = $group->save();

        if ($result) {
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
        $group = $this->taskRepository->UpdateGroup($request, $group);

        $result = $group->update();

        if ($result) {
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
        if ($group->delete()) {
            return redirect()->to('project/'.$project->id.'/task')->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
