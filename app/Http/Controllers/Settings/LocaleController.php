<?php

namespace App\Http\Controllers\Settings;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\System\ConfigSystem\UserConfigSystem;
use App\UserConfig;
use App;

class LocaleController extends Controller
{
    /**
     * 用户配置系统
     *
     * @var UserConfigSystem
     */
    protected $configSystem;


    /**
     * 构造器
     *
     * LocaleController constructor.
     * @param UserConfigSystem $userConfigSystem
     */
    public function __construct(UserConfigSystem $userConfigSystem)
    {
        $this->configSystem = $userConfigSystem;
    }

    /**
     * 语言和地区
     *
     * @return mixed
     */
    public function locale()
    {
        return view('settings.locale.index')->with(['mode' => 'locale']);
    }

    /**
     * 语言和地区更新
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function updateLocale(Request $request)
    {
        $result = $this->configSystem->setConfigInfo($request->user(), UserConfig::LANG, $request->get(UserConfig::LANG));

        $locale = UserConfig::get($request->user(), UserConfig::LANG);
        $request->session()->put('lang', $locale);
        App::setLocale($locale);

        if ($result) {
            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }
}
