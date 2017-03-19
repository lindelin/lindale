<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class AccountController extends Controller
{
    /**
     * Index.
     *
     * @return mixed
     */
    public function index()
    {
        return view('settings.account.index')->with('mode', 'account');
    }

    /**
     * 修改密码
     *
     * @param Request $request
     * @return mixed
     */
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new-password' => 'required|min:6|max:15|confirmed'
        ]);

        $user = $request->user();

        if(Hash::check($request->get('password'), $user->password)){
            $user->password = bcrypt($request->get('new-password'));
            return response()->update($user->update());
        }else{
            return redirect()->back()->withErrors(trans('auth.failed'));
        }
    }
}
