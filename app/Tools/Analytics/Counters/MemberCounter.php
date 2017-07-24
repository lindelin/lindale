<?php

namespace App\Tools\Analytics\Counters;


use App\Project\Project;
use App\User;

trait MemberCounter
{

    /**
     * 总计成员所有数
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTotalCount(Project $project, User $user)
    {
        return (int) $this->memberTaskCount($project, $user) + $this->memberTodoCount($project, $user);
    }

    /**
     * 总计成员完成数
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTotalFinishedCount(Project $project, User $user)
    {
        return (int) $this->memberTaskFinishedCount($project, $user) + $this->memberTodoFinishedCount($project, $user);
    }

    /**
     * 合计项目中成员的任务总数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTaskCount(Project $project, User $user)
    {
        return (int) $project->Tasks()->where('user_id', $user->id)->count();
    }

    /**
     * 合计项目中成员已完成任务数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTaskFinishedCount(Project $project, User $user)
    {
        return (int) $project->Tasks()
            ->where('user_id', $user->id)
            ->where('is_finish', config('task.finished'))
            ->count();
    }

    /**
     * 合计项目中成员未完成任务数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTaskUnfinishedCount(Project $project, User $user)
    {
        return (int) $project->Tasks()
            ->where('user_id', $user->id)
            ->where('is_finish', config('task.unfinished'))
            ->count();
    }

    /**
     * 项目中成员待办总数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTodoCount(Project $project, User $user)
    {
        return (int) $project->todos()
            ->where('user_id', $user->id)
            ->where('type_id', config('todo.public'))
            ->count();
    }

    /**
     * 项目中成员完成待办数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTodoFinishedCount(Project $project, User $user)
    {
        return (int) $project->todos()
            ->where('user_id', $user->id)
            ->where('type_id', config('todo.public'))
            ->where('status_id', config('todo.status.finished'))
            ->count();
    }
}