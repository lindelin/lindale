<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UaerPolicy
{
    use HandlesAuthorization;

    public function insert()
    {
        return false;
    }

    public function update()
    {
        return false;
    }

    public function delete()
    {
        return false;
    }

    /**
     * Super Admin.
     *
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->id === 1 and $user->name == 'Admin' and $user->email == 'admin@lindale.tk') {
            return true;
        }
    }
}
