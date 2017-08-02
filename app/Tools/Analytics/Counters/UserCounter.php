<?php

namespace App\Tools\Analytics\Counters;

use App\User;
use App\Todo\TodoType;
use App\Project\Project;
use App\Todo\TodoStatus;

trait UserCounter
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
        return (int) ($user->Tasks()
            ->where('is_finish', config('task.unfinished'))
            ->count());
    }

    /**
     * 合计用户完成任务总数.
     *
     * @param User $user
     * @return int
     */
    public function UserFinishedTaskCount(User $user)
    {
        return (int) ($user->Tasks()
            ->where('is_finish', config('task.finished'))
            ->count());
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
        return (int) $user->Todos()
            ->where('status_id', config('todo.status.finished'))
            ->count();
    }

    /**
     * 合计用户未完成待办总数.
     *
     * @param User $user
     * @return int
     */
    public function UserTodoUnfinishedCount(User $user)
    {
        return (int) $user->Todos()
            ->where('status_id', '<>', config('todo.status.finished'))
            ->count();
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
        return (int) $user->Todos()
            ->where('type_id', $type->id)
            ->count();
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
        return (int) $user->Todos()
            ->where('type_id', $type->id)
            ->where('status_id', config('todo.status.finished'))
            ->count();
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
        return (int) $user->Todos()
            ->where('status_id', $status->id)
            ->count();
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
        return (int) $user->Todos()
            ->where('type_id', $type->id)
            ->where('status_id', $status->id)
            ->count();
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
}
