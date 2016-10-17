<?php

namespace App\Policies;

use App\Definer;
use App\Project\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Hash;
use Admin;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * プロジェクトリーダーのみ（パスワード必要）
     *
     * @param User $user
     * @param Project $project
     * @param $request
     * @return bool
     */
    public function delete(User $user, Project $project, $request)
    {
        return $user->id === $project->user_id and Hash::check($request->get('password'), $project->password);
    }

    /**
     * プロジェクトリーダーとサブリーダーのみ（パスワード必要）
     *
     * @param User $user
     * @param Project $project
     * @param $request
     * @return bool
     */
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

    /**
     * プロジェクトリーダー
     * サブリーダー
     * マネージャー
     *
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function member(User $user, Project $project)
    {
        if ($user->id === $project->user_id) {
            return true;
        } elseif ($user->id === $project->sl_id) {
            return true;
        } elseif ($project->Users()->find($user->id)->pivot->is_admin === Definer::PROJECT_ADMIN) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Super Admin
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
