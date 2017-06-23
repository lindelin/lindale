<?php

namespace App\Http\Middleware;

use Auth;
use Config;
use Closure;

class UseLang
{
    /**
     * 初始化／设置语言的中间件.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            if ($request->session()->has('lang_guest')) {
                $locale = $request->session()->get('lang_guest');
                \App::setLocale($locale);
                \Carbon\Carbon::setLocale($locale);
            } else {
                $locale = config('app.fallback_locale');
                $request->session()->put('lang_guest', $locale);
                \App::setLocale($locale);
                \Carbon\Carbon::setLocale($locale);
            }
        } else {
            if ($request->session()->has('lang')) {
                $locale = $request->session()->get('lang');
                \App::setLocale($locale);
                \Carbon\Carbon::setLocale($locale);
            } else {
                $locale = user_config(Auth::user(), config('config.user.lang'));
                $request->session()->put('lang', $locale);
                \App::setLocale($locale);
                \Carbon\Carbon::setLocale($locale);
            }
        }

        return $next($request);
    }
}
