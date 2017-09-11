<?php

namespace App\Tools\Authenticates;


use App\User;

trait InviteAble
{
    /**
     * ユーザ招待
     * @param User $user
     */
    public function invite(User $user)
    {
        $this->createToken($user)->send();
    }

    /**
     * トークン作成
     * @param User $user
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    protected function createToken(User $user)
    {
        return AuthToken::generateFor($user);
    }
}