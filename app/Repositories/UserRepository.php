<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryContract;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryContract
{
    /**
     * 获得全部用户.
     *
     * @return array
     */
    public function allUser()
    {
        $users = User::all();

        return compact('users');
    }

    /**
     * 创建用户方法.
     *
     * @param UserRequest $request
     * @return User
     */
    public function createUser($request)
    {
        $user = new User();

        $input = $request->all(['email', 'content', 'name']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $user->$key = $value;
        }

        $user->password = bcrypt($request->get('password'));

        return $user;
    }

    /**
     * 删除用户的相关内容.
     *
     * @param User $user
     * @return mixed
     */
    public function deleteUser(User $user)
    {
        return $user->MyProjects()->delete();
    }

    /**
     * 获取本人信息.
     *
     * @param Request $request
     * @return array
     */
    public function myInfo($request)
    {
        $user = User::findOrFail($request->user()->id);

        return compact('user');
    }

    /**
     * 更新用户信息.
     *
     * @param UserRequest $request
     * @param User $user
     * @return User
     */
    public function updateUser($request, User $user)
    {
        $input = $request->all([
            'name',
            'content',
            'company',
            'location',
            'phone',
            'fax',
            'mobile',
            'github',
            'slack',
            'facebook',
            'qq',
        ]);

        if ($request->file('photo')) {
            $path = $request->file('photo')->store('photo/'.$user->id, 'public');
            if ($user->photo != '') {
                Storage::delete('public/'.$user->photo);
            }
            $user->photo = $path;
        }

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $user->$key = $value;
        }

        return $user;
    }
}
