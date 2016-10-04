<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function MyInfo(Request $request)
    {
        $user = User::findOrFail($request->user()->id);

        return compact('user');
    }

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
