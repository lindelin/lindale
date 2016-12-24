<?php

namespace App\Policies;

use App\Project\Project;
use App\Todo\Todo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Admin;

class TodoPolicy
{
    use HandlesAuthorization;

    /**
     * 删除To-do的授权策略.
     *
     * @param User $user
     * @param Todo $todo
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, Todo $todo, Project $project)
    {
        if ($this->UserPolicy($user, $todo)) {
            return true;
        } elseif ($this->ProjectPolicy($todo, $project)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 更新To-do的授权策略.
     *
     * @param User $user
     * @param Todo $todo
     * @param Project $project
     * @return bool
     */
    public function update(User $user, Todo $todo, Project $project)
    {
        return $this->delete($user, $todo, $project);
    }

    /**
     * 用户更新To-do的授权策略.
     *
     * @param User $user
     * @param Todo $todo
     * @return bool
     */
    public function user(User $user, Todo $todo)
    {
        return $this->UserPolicy($user, $todo);
    }

    /**
     * 用户授权策略.
     *
     * @param User $user
     * @param Todo $todo
     * @return bool
     */
    private function UserPolicy(User $user, Todo $todo)
    {
        return (int) $user->id === (int) $todo->user_id;
    }

    /**
     * 项目授权策略.
     *
     * @param Todo $todo
     * @param Project $project
     * @return bool
     */
    private function ProjectPolicy(Todo $todo, Project $project)
    {
        return (int) $project->id === (int) $todo->project_id;
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
