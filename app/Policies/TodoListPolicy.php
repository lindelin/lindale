<?php

namespace App\Policies;

use App\Todo\TodoList;
use App\User;
use App\Project\Project;
use Illuminate\Auth\Access\HandlesAuthorization;
use Admin;

class TodoListPolicy
{
    use HandlesAuthorization;

    /**
     * 删除To-do列表的授权策略.
     *
     * @param User $user
     * @param TodoList $list
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, TodoList $list, Project $project)
    {
        if ($this->UserPolicy($user, $list)) {
            return true;
        } elseif ($this->ProjectPolicy($list, $project)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 用户更新To-do List的授权策略.
     *
     * @param User $user
     * @param TodoList $list
     * @return bool
     */
    public function user(User $user, TodoList $list)
    {
        return $this->UserPolicy($user, $list);
    }

    /**
     * 用户授权策略.
     *
     * @param User $user
     * @param TodoList $list
     * @return bool
     */
    private function UserPolicy(User $user, TodoList $list)
    {
        return (int) $user->id === (int) $list->user_id;
    }

    /**
     * 项目授权策略.
     *
     * @param TodoList $list
     * @param Project $project
     * @return bool
     */
    private function ProjectPolicy(TodoList $list, Project $project)
    {
        return (int) $project->id === (int) $list->project_id;
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
