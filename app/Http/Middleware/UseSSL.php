<?php

namespace App\Http\Middleware;

use Closure;

class UseSSL
{
    /**
     * Handle an incoming request.
     * Redirect HTTP to HTTPS
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('APP_ENV') === 'production')
        {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}
