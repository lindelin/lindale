<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class HomeController extends Controller
{

    /**
     * 歓迎画面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }


    /**
     * 言語変更スイッチ
     *
     * @param Request $request
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lang(Request $request, $locale)
    {
        if (in_array($locale, Config::get('app.available_locales'))) {
            $request->session()->put('lang', $locale);
        }

        return redirect()->back();
    }
}
