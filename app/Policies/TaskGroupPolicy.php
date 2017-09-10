<?php

namespace App\Policies;

use App\Project\Project;
use App\Task\TaskGroup;
use App\User;
use Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskGroupPolicy
{
    use HandlesAuthorization;

    /**
     * create.
     * @param User $user
     * @param TaskGroup $taskGroup
     * @param Project $project
     * @return bool
     */
    public function create(User $user, TaskGroup $taskGroup, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $taskGroup->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $taskGroup->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $taskGroup->project_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * update.
     * @param User $user
     * @param TaskGroup $taskGroup
     * @param Project $project
     * @return bool
     */
    public function update(User $user, TaskGroup $taskGroup, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $taskGroup->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $taskGroup->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $taskGroup->project_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * delete.
     * @param User $user
     * @param TaskGroup $taskGroup
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, TaskGroup $taskGroup, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $taskGroup->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $taskGroup->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $taskGroup->project_id)) {
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
