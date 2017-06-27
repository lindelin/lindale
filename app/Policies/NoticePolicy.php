<?php

namespace App\Policies;

use App\Notice\Notice;
use App\Project\Project;
use App\User;
use Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticePolicy
{
    use HandlesAuthorization;

    /**
     * create.
     * @param User $user
     * @param Notice $notice
     * @param Project $project
     * @return bool
     */
    public function create(User $user, Notice $notice, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $notice->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $notice->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $notice->project_id)) {
            return false;
        } else {
            return false;
        }
    }

    /**
     * update.
     * @param User $user
     * @param Notice $notice
     * @param Project $project
     * @return bool
     */
    public function update(User $user, Notice $notice, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $notice->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $notice->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $notice->project_id)) {
            return false;
        } else {
            return false;
        }
    }

    /**
     * delete.
     * @param User $user
     * @param Notice $notice
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, Notice $notice, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $notice->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $notice->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)->pivot->is_admin === config('admin.project_admin')) and ($project->id === $notice->project_id)) {
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
