<?php

namespace App\Http\Middleware;

use Closure;

class ApiLang
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
        $locale = user_config($request->user(), config('config.user.lang'));
        \App::setLocale($locale);
        \Carbon\Carbon::setLocale($locale);

        return $next($request);
    }
}
