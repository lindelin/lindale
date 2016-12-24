<?php

namespace App\Policies;

use App\Task\TaskActivity;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Admin;

class TaskActivityPolicy
{
    use HandlesAuthorization;

    /**
     * 删除任务动态的授权策略
     *
     * @param User $user
     * @param TaskActivity $taskActivity
     * @return bool
     */
    public function delete(User $user, TaskActivity $taskActivity)
    {
        return ($user->id === $taskActivity->user_id);
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
