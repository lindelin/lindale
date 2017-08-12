<?php

namespace App\Http\Controllers\Settings;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\System\Contracts\ConfigSystem\UserConfigSystemContract;

class LocaleController extends Controller
{
    /**
     * 用户�
     * �置系统
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
     * 语言和地区.
     *
     * @return mixed
     */
    public function locale()
    {
        return view('settings.locale.index')->with(['mode' => 'locale']);
    }

    /**
     * 语言和地区更新.
     *
     * @param Request $request
     * @return mixed
     */
    public function updateLocale(Request $request)
    {
        $result = $this->configSystem->set($request->user(), config('config.user.lang'), $request->get(config('config.user.lang')));

        $locale = user_config($request->user(), config('config.user.lang'));
        $request->session()->put('lang', $locale);
        App::setLocale($locale);

        return response()->update($result);
    }
}
