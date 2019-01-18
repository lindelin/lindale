<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Http\Requests\UserRequest;
use App\System\Contracts\ConfigSystem\UserConfigSystemContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class SettingsController extends Controller
{
    /**
     * 用户配置系统
     *
     * @var UserConfigSystemContract
     */
    protected $configSystem;

    /**
     * 用户资源库.
     * @var UserRepositoryContract
     */
    protected $userRepository;

    /**
     * 构造器.
     *
     * LocaleController constructor.
     * @param UserConfigSystemContract $configSystem
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserConfigSystemContract $configSystem, UserRepositoryContract $userRepository)
    {
        $this->configSystem = $configSystem;
        $this->userRepository = $userRepository;
    }

    /**
     * 言語&地区　設定
     * @return \Illuminate\Http\JsonResponse
     */
    public function locale()
    {
        $lang = user_config(request()->user(), config('config.user.lang'));
        return response()->json([
            'current_language' => $lang,
            'current_language_name' => config('app.available_language.' . $lang),
            'options' => config('app.available_language'),
        ], 200);
    }

    /**
     * 言語&地区　更新
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateLocale(Request $request)
    {
        $this->validate($request, [
            'language' => 'required'
        ]);

        $this->configSystem->set($request->user(), config('config.user.lang'), $request->input('language'));

        //$locale = user_config($request->user(), config('config.user.lang'));
        //App::setLocale($locale);

        return response()->json(['status' => 'OK'], 200);
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
            'new_password' => 'required|min:6|max:15|confirmed',
        ]);

        $user = $request->user();

        if (Hash::check($request->input('password'), $user->password)) {
            $user->password = bcrypt($request->get('new_password'));
            $user->update();
            return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
        } else {
            return response()->json(['status' => 'NG', 'messages' => trans('auth.failed')], 200);
        }
    }

    /**
     * 通知.
     *
     * @return mixed
     */
    public function notification()
    {
        $slack = user_config(request()->user(), config('config.user.slack'));
        return response()->json(['slack' => $slack], 200);
    }

    /**
     * Slack通知更新.
     *
     * @param Request $request
     * @return mixed
     */
    public function updateNotification(Request $request)
    {
        $this->validate($request, [
            'slack' => 'required',
        ]);

        $this->configSystem->set($request->user(), config('config.user.slack'), $request->input('slack'));

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }

    /**
     * プロフィール更新
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(UserRequest $request)
    {
        $this->userRepository->updateUser($request, $request->user())->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }
}
