<?php

namespace App\Repositories;

use App\User;
use Definer;
use App\Task\Task;
use App\Task\SubTask;
use App\Task\TaskType;
use App\Task\TaskGroup;
use App\Project\Project;
use App\Task\TaskStatus;
use App\Task\TaskActivity;
use App\Task\TaskPriority;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskGroupRequest;

class TaskRepository
{
    /**
     * 任务资源.
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

        if ($is_finish !== null) {
            $tasks = $tasks->where('is_finish', $is_finish);
        }

        if ($type != null) {
            $tasks = $tasks->where('type_id', $type->id);
        }

        if ($priority != null) {
            $tasks = $tasks->where('priority_id', $priority->id);
        }

        if ($status != null) {
            $tasks = $tasks->where('status_id', $status->id)->where('is_finish', config('task.unfinished'));
        }

        $tasks = $tasks
            ->orderBy('is_finish', 'asc')
            ->latest()
            ->orderBy('priority_id', 'desc')
            ->paginate(10);

        return array_merge(compact('tasks'), $resources);
    }

    /**
     * 用户任务资源.
     *
     * @param User $user
     * @param null $is_finish
     * @param Project|null $project
     * @param TaskPriority|null $priority
     * @return array
     */
    public function UserTaskResources(User $user, $is_finish = null, Project $project = null, TaskPriority $priority = null)
    {
        $tasks = $user->Tasks();

        if ($is_finish !== null) {
            $tasks = $tasks->where('is_finish', $is_finish);
        }

        if ($project != null) {
            $tasks = $tasks->where('project_id', $project->id);
        }

        if ($priority != null) {
            $tasks = $tasks->where('priority_id', $priority->id);
        }

        $tasks = $tasks
            ->orderBy('is_finish', 'asc')
            ->latest()
            ->orderBy('priority_id', 'desc')
            ->paginate(10);

        $priorities = TaskPriority::all();

        return compact('tasks', 'priorities');
    }

    /**
     * 任务详情资源.
     *
     * @param Project $project
     * @param Task $task
     * @return array
     */
    public function TaskShowResources(Project $project, Task $task)
    {
        $resources = $this->Resources($project);
        $tasks = $project->Tasks;
        $subTask = $task->SubTasks()->orderBy('is_finish', 'asc')->latest()->simplePaginate(3, ['*'], 'stPage');
        $activities = $task->Activities()->latest()->paginate(5, ['*'], 'taPage');

        return array_merge(compact('tasks', 'subTask', 'activities'), $resources);
    }

    /**
     * 任务（创建）资源.
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
     * 任务组资源.
     *
     * @param Project $project
     * @return array
     */
    public function TaskGroupResources(Project $project)
    {
        $taskGroupCreteResources = $this->TaskGroupCreateResources($project);
        $groups = $project->TaskGroups()->orderBy('status_id', 'asc')->latest()->paginate(3);
        $openGroups = $project->TaskGroups()->where('status_id', '<>', TaskGroup::CLOSE)->latest()->get();

        return array_merge(compact('groups', 'openGroups'), $taskGroupCreteResources);
    }

    /**
     * 任务组（创建）资源.
     *
     * @param Project $project
     * @return array
     */
    public function TaskGroupCreateResources(Project $project)
    {
        return $this->Resources($project);
    }

    /**
     * 关联资源.
     *
     * @param Project $project
     * @return array
     */
    private function Resources(Project $project)
    {
        $type = TaskType::firstOrCreate(
            [
                'project_id' => $project->id,
            ],
            [
                'name' => 'task.default',
                'color_id' => config('color.default'),
            ]
        );
        if ($type != null) {
            $types = $project->TaskTypes;
        }

        $status = TaskStatus::firstOrCreate(
            [
                'project_id' => $project->id,
            ],
            [
                'name' => 'task.underway',
                'color_id' => config('color.primary'),
                'action_id' => config('todo.status.underway'),
            ]
        );
        if ($status != null) {
            $statuses = $project->TaskStatuses;
        }

        $priorities = TaskPriority::all();

        $taskGroupStatuses = [
            TaskGroup::OPEN => 'OPEN',
            TaskGroup::CLOSE => 'CLOSE',
            ];

        return compact('types', 'statuses', 'priorities', 'taskGroupStatuses');
    }

    /**
     * 创建任务方法.
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
        $task->initiator_id = $request->user()->id;

        return $task;
    }

    /**
     * 更新任务方法.
     *
     * @param TaskRequest $request
     * @param Task $task
     * @return Task
     */
    public function UpdateTask(TaskRequest $request, Task $task)
    {
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
            'is_finish',
        ]);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $task->$key = $value;
        }

        return $task;
    }

    /**
     * 创建任务组方法.
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
     * 更新任务组方法.
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

    /**
     * 更新附属任务方法.
     *
     * @param Request $request
     * @param SubTask $subTask
     * @return SubTask
     */
    public function UpdateSubTask(Request $request, SubTask $subTask)
    {
        $input = $request->only(['content', 'is_finish']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $subTask->$key = $value;
        }

        return $subTask;
    }

    /**
     * 创建任务动态方法.
     *
     * @param Request $request
     * @param Task $task
     * @return TaskActivity
     */
    public function CreateTaskActivity(Request $request, Task $task)
    {
        $activity = new TaskActivity();

        $input = $request->only(['content', 'is_finish']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $activity->$key = $value;
        }

        $activity->task_id = $task->id;
        $activity->user_id = $request->user()->id;

        return $activity;
    }

    /**
     * 更新任务进度方法.
     *
     * @param $progress
     * @param Task $task
     * @return bool
     */
    public function UpdateTaskProgress($progress, Task $task)
    {
        if ((int) $progress <= 100 and (int) $progress >= 0) {
            $task->progress = $progress;

            return $task->update();
        } else {
            return false;
        }
    }
}
