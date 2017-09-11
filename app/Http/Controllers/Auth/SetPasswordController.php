<?php

namespace App\Http\Controllers\Auth;

use App\Tools\Authenticates\AuthToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetPasswordController extends Controller
{
    /**
     * パスワード設定フォーム
     * @param AuthToken $token
     * @return mixed
     */
    public function showSetForm(AuthToken $token)
    {
        return view('auth.passwords.set')->with([
            'token' => $token->token,
            'email' => $token->user->email,
        ]);
    }

    /**
     * パスワード設定
     * @param Request $request
     * @return mixed
     */
    public function setPassword(Request $request)
    {
        $this->validate($request, $this->rules());

        $token = AuthToken::findByToken($request->token);

        $user = $token->user;

        if ($user->email == $request->email) {
            $user->password = bcrypt($request->password);
            $user->save();
            auth()->login($user);
            $token->delete();
            return redirect()->to(route('home'));
        } else {
            return redirect()->back()->withErrors('設定できません。管理者まで連略してください。');
        }
    }

    /**
     * パスワード設定入力チェック
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
