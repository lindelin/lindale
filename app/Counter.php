<?php

namespace App;


use App\Project\Project;
use App\Todo\TodoStatus;
use App\Todo\TodoType;

class Counter
{
    /**
     * 合计用户待办总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserTodoCount(User $user)
    {
        return (int)$user->Todos()->count();
    }

    /**
     * 合计用户完成待办总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserTodoFinishCount(User $user)
    {
        return (int)$user->Todos()->where('status_id', Definer::FINISH_STATUS_ID)->count();
    }

    /**
     * 合计用户待办总数（按类别）.
     *
     * @param User $user
     * @param $type
     * @return int
     */
    public static function UserTodoTypeCount(User $user, TodoType $type)
    {
        return (int)$user->Todos()->where('type_id', $type->id)->count();
    }

    /**
     * 合计用户完成待办总数（按类别）.
     *
     * @param User $user
     * @param $type
     * @return int
     */
    public static function UserTodoTypeFinishCount(User $user, TodoType $type)
    {
        return (int)$user->Todos()->where('type_id', $type->id)->where('status_id', Definer::FINISH_STATUS_ID)->count();
    }

    /**
     * 合计用户待办总数（按状态）.
     *
     * @param User $user
     * @param TodoStatus $status
     * @return int
     */
    public static function UserTodoStatus(User $user, TodoStatus $status)
    {
        return (int)$user->Todos()->where('status_id', $status->id)->count();
    }

    /**
     * 合计用户待办总数（按类别和状态）.
     *
     * @param User $user
     * @param TodoType $type
     * @param TodoStatus $status
     * @return int
     */
    public static function UserTodoTypeStatusCount(User $user, TodoType $type, TodoStatus $status)
    {
        return (int)$user->Todos()->where('type_id', $type->id)->where('status_id', $status->id)->count();
    }

    /**
     * 合计项目中用户负责的待办完成数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public static function UserProjectTodoFinishCount(Project $project, User $user)
    {
        return (int)$project
            ->Todos()
            ->where('user_id', $user->id)
            ->where('type_id', Definer::PUBLIC_TODO)
            ->where('status_id', Definer::FINISH_STATUS_ID)
            ->count();
    }

    /**
     * 合计项目中用户负责的待办总数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public static function UserProjectTodoCount(Project $project, User $user)
    {
        return (int)$project
            ->Todos()
            ->where('user_id', $user->id)
            ->where('type_id', Definer::PUBLIC_TODO)
            ->count();
    }
}