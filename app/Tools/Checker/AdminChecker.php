<?php
/**
 * Created by PhpStorm.
 * User: LINDALE
 * Date: 2017/06/16
 * Time: 午後1:09.
 */

namespace App\Tools\Checker;

use App\User;

trait AdminChecker
{
    /**
     * Super Admin Checker.
     * @param User $user
     * @return bool
     */
    protected function super_admin(User $user)
    {
        return
            $user->id === (int) config('admin.super_admin.id') and
            $user->name == config('admin.super_admin.name') and
            $user->email == config('admin.super_admin.email');
    }
}
