<?php

namespace App\Policies;

use App\Task\Task;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * @return bool
     */
    public function destroy()
    {
        return false;
    }

    /**
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function update(User $user, Task $task)
    {
        return true;
    }

    /**
     * Super Admin
     *
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        if($user->id === 1 and $user->name == 'Admin' and $user->email == 'admin@lindale.tk'){
            return true;
        }
    }
}
