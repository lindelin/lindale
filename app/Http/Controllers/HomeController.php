<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
