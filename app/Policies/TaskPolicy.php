<?php

namespace App\Policies;

use Admin;
use App\User;
use App\Task\Task;
use App\Project\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * create.
     * @param User $user
     * @param Task $task
     * @param Project $project
     * @return bool
     * @internal param Wiki $wiki
     */
    public function create(User $user, Task $task, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $task->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $task->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $task->project_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * update.
     * @param User $user
     * @param Task $task
     * @param Project $project
     * @return bool
     * @internal param Wiki $wiki
     */
    public function update(User $user, Task $task, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $task->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $task->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $task->project_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * show.
     * @param User $user
     * @param Task $task
     * @param Project $project
     * @return bool
     * @internal param Wiki $wiki
     */
    public function show(User $user, Task $task, Project $project = null)
    {
        if ($project === null) {
            $project = $task->Project;
        }

        if (($user->id === $project->user_id) and ($project->id === $task->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $task->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $task->project_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * delete.
     * @param User $user
     * @param Task $task
     * @param Project $project
     * @return bool
     * @internal param Wiki $wiki
     */
    public function delete(User $user, Task $task, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $task->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $task->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)->pivot->is_admin === config('admin.project_admin')) and ($project->id === $task->project_id)) {
            return false;
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
