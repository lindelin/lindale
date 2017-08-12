<?php

namespace App\Policies;

use App\User;
use App\Tools\Checker\AdminChecker;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization, AdminChecker;

    /**
     * �
     * 级用户的授权策略.
     *
     * @param User $user
     * @return bool
     */
    public function is_super_admin(User $user)
    {
        if ($this->super_admin($user)) {
            return true;
        } else {
            return false;
        }
    }
}
