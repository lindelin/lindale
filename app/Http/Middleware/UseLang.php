<?php

namespace App\Http\Middleware;

use Closure;

class UseLang
{
    /**
     * 初始化／设置语言的中间件
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('lang')) {
            $locale = $request->session()->get('lang');
            \App::setLocale($locale);
        } else {
            $locale = 'en';
            $request->session()->put('lang', $locale);
            \App::setLocale($locale);
        }

        return $next($request);
    }
}
