<?php

namespace App\Repositories;


use App\Definer;
use App\Http\Requests\TaskGroupRequest;
use App\Http\Requests\TaskRequest;
use App\Project\Project;
use App\Task\Task;
use App\Task\TaskGroup;
use App\Task\TaskPriority;
use App\Task\TaskStatus;
use App\Task\TaskType;

class TaskRepository
{
    /**
     * 任务资源
     *
     * @param Project $project
     * @param null $is_finish
     * @param TaskType|null $type
     * @param TaskPriority|null $priority
     * @param TaskStatus|null $status
     * @return array
     */
    public function TaskResources(Project $project, $is_finish = null, TaskType $type = null, TaskPriority $priority = null, TaskStatus $status = null)
    {
        $resources = $this->Resources($project);
        $tasks = $project->Tasks();

        if($is_finish !== null){
            $tasks = $tasks->where('is_finish', $is_finish);
        }

        if($type != null){
            $tasks = $tasks->where('type_id', $type->id);
        }

        if($priority != null){
            $tasks = $tasks->where('priority_id', $priority->id);
        }

        if($status != null){
            $tasks = $tasks->where('status_id', $status->id)->where('is_finish', Definer::TASK_UNFINISHED);
        }

        $tasks = $tasks->orderBy('priority_id', 'desc')->orderBy('is_finish', 'asc')->get();

        return array_merge(compact('tasks'), $resources);
    }


    /**
     * 任务（创建）资源
     *
     * @param Project $project
     * @return array
     */
    public function TaskCreateResources(Project $project)
    {
        $resources = $this->TaskGroupResources($project);
        $tasks = $project->Tasks;
        $users = $project->Users;

        return array_merge(compact('tasks', 'users'), $resources);
    }

    /**
     * 任务组资源
     *
     * @param Project $project
     * @return array
     */
    public function TaskGroupResources(Project $project)
    {
        $taskGroupCreteResources = $this->TaskGroupCreateResources($project);
        $groups = $project->TaskGroups;


        return array_merge(compact('groups'), $taskGroupCreteResources);
    }

    /**
     * 任务组（创建）资源
     *
     * @param Project $project
     * @return array
     */
    public function TaskGroupCreateResources(Project $project)
    {
        return $this->Resources($project);
    }

    /**
     * 关联资源
     *
     * @param Project $project
     * @return array
     */
    private function Resources(Project $project)
    {
        $type = TaskType::firstOrCreate(
            [
                'project_id' => $project->id
            ],
            [
                'name' => 'task.default',
                'color_id' => Definer::DEFAULT_COLOR_ID
            ]
        );
        if($type != null){
            $types = $project->TaskTypes;
        }

        $status = TaskStatus::firstOrCreate(
            [
                'project_id' => $project->id
            ],
            [
                'name' => 'task.underway',
                'color_id' => Definer::PRIMARY_COLOR_ID,
                'action_id' => Definer::UNDERWAY_STATUS_ID
            ]
        );
        if($status != null){
            $statuses = $project->TaskStatuses;
        }

        $priorities = TaskPriority::all();

        return compact('types', 'statuses', 'priorities');
    }

    /**
     * 创建任务方法
     *
     * @param TaskRequest $request
     * @param Project $project
     * @return Task
     */
    public function CreateTask(TaskRequest $request, Project $project)
    {
        $task = new Task();

        $input = $request->only([
            'group_id',
            'title',
            'content',
            'start_at',
            'end_at',
            'cost',
            'type_id',
            'user_id',
            'status_id',
            'priority_id',
            'color_id',
            'task_id',
        ]);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $task->$key = $value;
        }

        $task->project_id = $project->id;

        return $task;
    }

    /**
     * 创建任务组方法
     *
     * @param TaskGroupRequest $request
     * @param Project $project
     * @return TaskGroup
     */
    public function CreateGroup(TaskGroupRequest $request, Project $project)
    {
        $group = new TaskGroup();

        $input = $request->only(['title', 'information', 'type_id', 'status_id', 'start_at', 'end_at', 'color_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $group->$key = $value;
        }

        $group->project_id = $project->id;

        return $group;
    }

    /**
     * 更新任务组方法
     *
     * @param TaskGroupRequest $request
     * @param TaskGroup $group
     * @return TaskGroup
     */
    public function UpdateGroup(TaskGroupRequest $request, TaskGroup $group)
    {
        $input = $request->only(['title', 'information', 'type_id', 'status_id', 'start_at', 'end_at', 'color_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $group->$key = $value;
        }

        return $group;
    }
}