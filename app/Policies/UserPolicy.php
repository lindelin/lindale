<?php

namespace App\Policies;

use Admin;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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

    /**
     * ユーザー更新認可
     *
     * @param User $user
     * @param User $user_data
     * @return bool
     */
    public function update(User $user, User $user_data)
    {
        return $user->id === $user_data->id;
    }
}
