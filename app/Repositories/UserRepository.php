<?php

namespace App\Repositories;


use App\Http\Requests\UserRequest;
use App\User;

class UserRepository
{
    public function AllUser()
    {
        $users = User::all();
        return compact('users');
    }

    public function CreateUser(UserRequest $request, User $user)
    {
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

    public function DeleteUser(User $user)
    {
        $user->MyProjects()->delete();
    }
}