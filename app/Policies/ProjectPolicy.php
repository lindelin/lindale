<?php

namespace App\Policies;

use App\Project\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Hash;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Project $project, $request)
    {
        return $user->id === $project->user_id and Hash::check($request->get('password'), $project->password);
    }

    public function update(User $user, Project $project, $request)
    {
        if ($user->id === $project->user_id and Hash::check($request->get('project-pass'), $project->password)) {
            return true;
        } elseif ($user->id === $project->sl_id and Hash::check($request->get('project-pass'), $project->password)) {
            return true;
        } else {
            return false;
        }
    }

    public function member(User $user, Project $project)
    {
        if ($user->id === $project->user_id) {
            return true;
        } elseif ($user->id === $project->sl_id) {
            return true;
        } else {
            return false;
        }
    }
}
