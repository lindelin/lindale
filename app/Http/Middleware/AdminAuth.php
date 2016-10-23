<?php

namespace App\Http\Middleware;

use Closure;
use Admin;

class AdminAuth
{
    /**
     * 用于验证超级用户的中间件.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Admin::is_super_admin($request->user())) {
            return $next($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
