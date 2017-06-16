<?php

namespace App\Policies;

use App\Project\Project;
use App\User;
use Admin;
use App\Wiki\Wiki;
use Illuminate\Auth\Access\HandlesAuthorization;

class WikiPolicy
{
    use HandlesAuthorization;

    /**
     * create
     * @param User $user
     * @param Wiki $wiki
     * @param Project $project
     * @return bool
     */
    public function create(User $user, Wiki $wiki, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $wiki->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $wiki->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $wiki->project_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * create
     * @param User $user
     * @param Wiki $wiki
     * @param Project $project
     * @return bool
     */
    public function update(User $user, Wiki $wiki, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $wiki->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $wiki->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $wiki->project_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * create
     * @param User $user
     * @param Wiki $wiki
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, Wiki $wiki, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $wiki->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $wiki->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $wiki->project_id)) {
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
