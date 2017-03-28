<?php

namespace App\Http\Middleware;

use App;
use Closure;

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
        if (! $request->secure() and App::environment('staging')) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
