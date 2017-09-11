<?php

namespace App\Policies;

use Admin;
use App\Project\Project;
use App\Task\Task;
use App\User;
use App\Task\TaskActivity;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskActivityPolicy
{
    use HandlesAuthorization;

    /**
     * 删除任务动态的授权策略.
     * @param User $user
     * @param TaskActivity $taskActivity
     * @param Task $task
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, TaskActivity $taskActivity, Task $task, Project $project)
    {
        if (($user->id === $project->user_id)
            and ($project->id === $task->project_id)
            and ($taskActivity->task_id === $task->id)
            and ($user->id === $taskActivity->user_id)) {
            return true;
        } elseif (($user->id === $project->sl_id)
            and ($project->id === $task->project_id)
            and ($taskActivity->task_id === $task->id)
            and ($user->id === $taskActivity->user_id)) {
            return true;
        } elseif (($project->Users()->find($user->id))
            and ($project->id === $task->project_id)
            and ($taskActivity->task_id === $task->id)
            and ($user->id === $taskActivity->user_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Super Admin.
     *
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        if (Admin::is_super_admin($user)) {
            return true;
        }
    }
}
