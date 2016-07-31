<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index')->withUsers(User::all());
    }
    public function add(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
