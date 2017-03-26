<?php

namespace App\Http\Middleware;

use Closure;

class UseElasticLoadBalancingHttps
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
        $request->setTrustedProxies(['127.0.0.1', $request->server->get('REMOTE_ADDR')]);
        return $next($request);
    }
}
