<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Admin;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * スーパー管理人のみ
     *
     * @param User $user
     * @return mixed
     */
    public function admin(User $user)
    {
        return Admin::is_super_admin($user);
    }
}
