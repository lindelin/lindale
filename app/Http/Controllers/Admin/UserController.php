<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index')->withUsers(User::all());
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|unique:users|max:30',
            'email'    => 'required|unique:users|max:200|email',
            'password' => 'required|between:6,30|alpha_num|confirmed',
        ]);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        if ($user->save()) {
            return redirect('admin/user');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }
}
