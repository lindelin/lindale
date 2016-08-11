<?php

namespace App\Http\Middleware;

use Closure;
use App;
class UseSSL
{
    /**
     * Handle an incoming request.
     * Redirect HTTP to HTTPS.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->secure() and App::environment('production')) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
