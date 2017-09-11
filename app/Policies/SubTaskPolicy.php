<?php

namespace App\Policies;

use App\Project\Project;
use App\Task\SubTask;
use App\Task\Task;
use App\User;
use Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubTaskPolicy
{
    use HandlesAuthorization;

    /**
     * create.
     * @param User $user
     * @param SubTask $subTask
     * @param Task $task
     * @param Project $project
     * @return bool
     */
    public function update(User $user, SubTask $subTask, Task $task, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $task->project_id) and ($subTask->task_id === $task->id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $task->project_id) and ($subTask->task_id === $task->id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $task->project_id) and ($subTask->task_id === $task->id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * delete.
     * @param User $user
     * @param SubTask $subTask
     * @param Task $task
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, SubTask $subTask, Task $task, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $task->project_id) and ($subTask->task_id === $task->id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $task->project_id) and ($subTask->task_id === $task->id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $task->project_id) and ($subTask->task_id === $task->id)) {
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
