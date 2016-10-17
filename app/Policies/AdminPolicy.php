<?php

namespace App\Policies;

use App\Definer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public static function is_super_admin(User $user)
    {
        if ($user->id === Definer::SUPER_ADMIN_ID and
            $user->name == Definer::SUPER_ADMIN_NAME and
            $user->email == Definer::SUPER_ADMIN_EMAIL) {
            return true;
        } else {
            return false;
        }
    }
}
