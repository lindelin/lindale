<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserRepository
{
    /**
     * 获得�
     * �部用户.
     *
     * @return array
     */
    public function AllUser()
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
    public function CreateUser(UserRequest $request)
    {
        $user = new User();

        $input = $request->only(['email', 'content', 'name']);

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
     * 删除用户的相�
     * ��
     * 容.
     *
     * @param User $user
     */
    public function DeleteUser(User $user)
    {
        $user->MyProjects()->delete();
    }

    /**
     * 获取本人信息.
     *
     * @param Request $request
     * @return array
     */
    public function MyInfo(Request $request)
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
    public function UpdateUser(UserRequest $request, User $user)
    {
        $input = $request->only([
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
