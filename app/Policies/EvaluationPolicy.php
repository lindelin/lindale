<?php

namespace App\Policies;

use App\Project\Evaluation;
use App\Project\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvaluationPolicy
{
    use HandlesAuthorization;

    /**
     * update.
     * @param User $user
     * @param Evaluation $evaluation
     * @param Project $project
     * @return bool
     */
    public function update(User $user, Evaluation $evaluation, Project $project)
    {
        if (($user->id === $project->user_id) and ($project->id === $evaluation->project_id)) {
            return true;
        } elseif (($user->id === $project->sl_id) and ($project->id === $evaluation->project_id)) {
            return true;
        } elseif (($project->Users()->find($user->id)) and ($project->id === $evaluation->project_id)) {
            return false;
        } else {
            return false;
        }
    }
}
