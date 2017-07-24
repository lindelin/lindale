<?php

namespace App\Tools\Analytics\Progresses;


use App\User;
use Counter;
use App\Project\Project;

trait MemberProgress
{
    /**
     * 计算项目进度.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberProgress(Project $project, User $user)
    {
        $total = Counter::memberTotalCount($project, $user);
        $totalFiish = Counter::memberTotalFinishedCount($project, $user);

        if ($total > 0) {
            return (int) ($totalFiish / $total * 100);
        } else {
            return 0;
        }
    }

    /**
     * 计算项目任务进度.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTaskProgress(Project $project, User $user)
    {
        $total = Counter::memberTaskCount($project, $user);
        $totalFinish = Counter::memberTaskFinishedCount($project, $user);

        if ($total > 0) {
            return (int) ($totalFinish / $total * 100);
        } else {
            return 0;
        }
    }

    /**
     * 计算项目To-do进度.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public function memberTodoProgress(Project $project, User $user)
    {
        $total = Counter::memberTodoCount($project, $user);
        $totalFinish = Counter::memberTodoFinishedCount($project, $user);

        if ($total > 0) {
            return (int) ($totalFinish / $total * 100);
        } else {
            return 0;
        }
    }
}