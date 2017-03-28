<?php

namespace App\Http\Controllers\Settings;

use App;
use App\User;
use App\UserConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\System\ConfigSystem\UserConfigSystem;

class LocaleController extends Controller
{
    /**
     * 用户配置系统
     *
     * @var UserConfigSystem
     */
    protected $configSystem;

    /**
     * 构造器.
     *
     * LocaleController constructor.
     * @param UserConfigSystem $userConfigSystem
     */
    public function __construct(UserConfigSystem $userConfigSystem)
    {
        $this->configSystem = $userConfigSystem;
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
        $result = $this->configSystem->setConfigInfo($request->user(), UserConfig::LANG, $request->get(UserConfig::LANG));

        $locale = UserConfig::get($request->user(), UserConfig::LANG);
        $request->session()->put('lang', $locale);
        App::setLocale($locale);

        return response()->update($result);
    }
}
