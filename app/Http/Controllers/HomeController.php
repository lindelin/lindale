<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Config;

class HomeController extends Controller
{
    /**
     * @param int $order
     * @return mixed
     */
    public function index($order = 0)
    {
        switch ($order) {
            case 0:
                return view('home')->withArticles(\App\Article::latest()->paginate(5));
                break;
            case 1:
                return view('home')->withArticles(\App\Article::oldest()->paginate(5));
                break;
        }
    }

    /**
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
