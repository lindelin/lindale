<?php

namespace App\Contracts\Repositories;


use App\User;

interface UserRepositoryContract
{
    /**
     * 获得全部用户.
     * @return mixed
     */
    public function allUser();

    /**
     * 创建用户方法.
     * @param $request
     * @return mixed
     */
    public function createUser($request);

    /**
     * 删除用户的相关内容.
     * @param User $user
     * @return mixed
     */
    public function deleteUser(User $user);

    /**
     * 获取本人信息.
     * @param $request
     * @return mixed
     */
    public function myInfo($request);

    /**
     * 更新用户信息.
     * @param $request
     * @param User $user
     * @return mixed
     */
    public function updateUser($request, User $user);
}