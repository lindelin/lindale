<?php

namespace App\Http\Controllers\Api;

use App\System\Contracts\ConfigSystem\UserConfigSystemContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * 用户配置系统
     *
     * @var UserConfigSystemContract
     */
    protected $configSystem;

    /**
     * 构造器.
     *
     * LocaleController constructor.
     * @param UserConfigSystemContract $configSystem
     */
    public function __construct(UserConfigSystemContract $configSystem)
    {
        $this->configSystem = $configSystem;
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
}
