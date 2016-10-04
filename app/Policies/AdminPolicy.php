<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public static function is_super_admin(User $user)
    {
        if ($user->id === 1 and $user->name == 'Admin' and $user->email == 'admin@lindale.tk') {
            return true;
        } else {
            return false;
        }
    }
}
