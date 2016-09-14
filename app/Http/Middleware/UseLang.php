<?php

namespace App\Http\Middleware;

use Closure;

class UseLang
{
    /**
     * Handle an incoming request.
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
