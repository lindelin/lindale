<?php

namespace App\Tools\Analytics;

use App\User;
use App\Task\Task;
use App\Task\TaskType;
use App\Todo\TodoType;
use App\Task\TaskGroup;
use App\Project\Project;
use App\Task\TaskStatus;
use App\Todo\TodoStatus;
use App\Task\TaskPriority;

class Counter
{
    /**
     * 获取用户项目的总数.
     *
     * @param User $user
     * @return int
     */
    public function UserProjectCount(User $user)
    {
        return (int) ($user->MyProjects()->count() + $user->MySlProjects()->count() + $user->Projects()->count());
    }

    /**
     * 合计用户未完成任务总数.
     *
     * @param User $user
     * @return int
     */
    public function UserUnfinishedTaskCount(User $user)
    {
        return (int) ($user->Tasks()->where('is_finish', config('task.unfinished'))->count());
    }

    /**
     * 合计用户完成任务总数.
     *
     * @param User $user
     * @return int
     */
    public function UserFinishedTaskCount(User $user)
    {
        return (int) ($user->Tasks()->where('is_finish', config('task.finished'))->count());
    }

    /**
     * 合计用户任务总数.
     *
     * @param User $user
     * @return int
     */
    public function UserTaskCount(User $user)
    {
        return (int) ($user->Tasks()->count());
    }

    /**
     * 合计用户待办总数.
     *
     * @param User $user
     * @return int
     */
    public function UserTodoCount(User $user)
    {
        return (int) $user->Todos()->count();
    }

    /**
     * 合计用户完成待办总数.
     *
     * @param User $user
     * @return int
     */
    public function UserTodoFinishCount(User $user)
    {
        return (int) $user->Todos()->where('status_id', config('todo.status.finished'))->count();
    }

    /**
     * 合计用户未完成待办总数.
     *
     * @param User $user
     * @return int
     */
    public function UserTodoUnfinishedCount(User $user)
    {
        return (int) $user->Todos()->where('status_id', '<>', config('todo.status.finished'))->count();
    }

    /**
     * 合计用户待办总数（按类别）.
     *
     * @param User $user
     * @param $type
     * @return int
     */
    public function UserTodoTypeCount(User $user, TodoType $type)
    {
        return (int) $user->Todos()->where('type_id', $type->id)->count();
    }

    /**
     * 合计用户完成待办总数（按类别）.
     *
     * @param User $user
     * @param $type
     * @return int
     */
    public function UserTodoTypeFinishCount(User $user, TodoType $type)
    {
        return (int) $user->Todos()->where('type_id', $type->id)->where('status_id', config('todo.status.finished'))->count();
    }

    /**
     * 合计用户待办总数（按状态）.
     *
     * @param User $user
     * @param TodoStatus $status
     * @return int
     */
    public function UserTodoStatus(User $user, TodoStatus $status)
    {
        return (int) $user->Todos()->where('status_id', $status->id)->count();
    }

    /**
     * 合计用户待办总数（按类别和状态）.
     *
     * @param User $user
     * @param TodoType $type
     * @param TodoStatus $status
     * @return int
     */
    public function UserTodoTypeStatusCount(User $user, TodoType $type, TodoStatus $status)
    {
        return (int) $user->Todos()->where('type_id', $type->id)->where('status_id', $status->id)->count();
    }

    /**
     * 合计项目中用户负责的待办完成数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function UserProjectTodoFinishCount(Project $project, User $user)
    {
        return (int) $project
            ->Todos()
            ->where('user_id', $user->id)
            ->where('type_id', config('todo.public'))
            ->where('status_id', config('todo.status.finished'))
            ->count();
    }

    /**
     * 合计项目中用户负责的待办总数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function UserProjectTodoCount(Project $project, User $user)
    {
        return (int) $project
            ->Todos()
            ->where('user_id', $user->id)
            ->where('type_id', config('todo.public'))
            ->count();
    }

    /**
     * 合计任务组包含的任务总数.
     *
     * @param TaskGroup $group
     * @return int
     */
    public function GroupTaskCount(TaskGroup $group)
    {
        return (int) $group->Tasks()->count();
    }

    /**
     * 合计任务组包含的已完成任务数.
     *
     * @param TaskGroup $group
     * @return int
     */
    public function GroupTaskFinishCount(TaskGroup $group)
    {
        return (int) $group->Tasks()->where('is_finish', config('task.finished'))->count();
    }

    /**
     * 合计任务组中未完成任务数.
     *
     * @param TaskGroup $group
     * @return int
     */
    public function GroupTaskUnfinishedCount(TaskGroup $group)
    {
        return (int) $group->Tasks()->where('is_finish', config('task.unfinished'))->count();
    }

    /**
     * 合计项目中任务组数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskGroupCount(Project $project)
    {
        return (int) $project->TaskGroups()->count();
    }

    /**
     * 合计项目中的任务总数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskCount(Project $project)
    {
        return (int) $project->Tasks()->count();
    }

    /**
     * 合计项目中已完成任务数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskFinishedCount(Project $project)
    {
        return (int) $project->Tasks()->where('is_finish', config('task.finished'))->count();
    }

    /**
     * 合计项目中未完成任务数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskUnfinishedCount(Project $project)
    {
        return (int) $project->Tasks()->where('is_finish', config('task.unfinished'))->count();
    }

    /**
     * 合计项目中的任务数（类型别）.
     *
     * @param Project $project
     * @param TaskType $type
     * @param null $is_finish
     * @return int
     */
    public function ProjectTypeTaskCount(Project $project, TaskType $type, $is_finish = null)
    {
        $task = $project->Tasks()->where('type_id', $type->id);
        if ($is_finish !== null) {
            $task = $task->where('is_finish', $is_finish);
        }

        return (int) $task->count();
    }

    /**
     * 项目中完成待办数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTodoFinishedCount(Project $project)
    {
        return (int) $project
            ->todos()
            ->where('type_id', config('todo.public'))
            ->where('status_id', config('todo.status.finished'))
            ->count();
    }

    /**
     * 项目中待办总数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTodoCount(Project $project)
    {
        return (int) $project
            ->todos()
            ->where('type_id', config('todo.public'))
            ->count();
    }

    /**
     * 合计项目中的任务数（状态别）.
     *
     * @param Project $project
     * @param TaskStatus $status
     * @return int
     * @internal param null $is_finish
     */
    public function ProjectStatusTaskCount(Project $project, TaskStatus $status)
    {
        $task = $project->Tasks()->where('status_id', $status->id)->where('is_finish', config('task.unfinished'));

        return (int) $task->count();
    }

    /**
     * 合计项目中的任务数（优先度别）.
     *
     * @param Project $project
     * @param TaskPriority $priority
     * @param null $is_finish
     * @return int
     */
    public function ProjectPriorityTaskCount(Project $project, TaskPriority $priority, $is_finish = null)
    {
        $task = $project->Tasks()->where('priority_id', $priority->id);
        if ($is_finish !== null) {
            $task = $task->where('is_finish', $is_finish);
        }

        return (int) $task->count();
    }

    /**
     * 任务中的附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public function SubTaskCount(Task $task)
    {
        return (int) $task->SubTasks()->count();
    }

    /**
     * 任务中的已完成附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public function FinishedSubTasks(Task $task)
    {
        return (int) $task->SubTasks()->where('is_finish', config('task.finished'))->count();
    }

    /**
     * 任务中的未完成附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public function UnfinishedSubTasks(Task $task)
    {
        return (int) $task->SubTasks()->where('is_finish', config('task.unfinished'))->count();
    }
}
