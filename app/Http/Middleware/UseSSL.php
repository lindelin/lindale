<?php

namespace App\Http\Middleware;

use Closure;
use App;

class UseSSL
{
    /**
     * 强制用户以HTTPS访问系统
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->secure() and (App::environment('production') or App::environment('staging'))) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
