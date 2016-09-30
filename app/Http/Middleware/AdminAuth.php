<?php

namespace App\Http\Middleware;

use Closure;
use Admin;

class AdminAuth
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

        if(Admin::is_super_admin($request->user())){
            return $next($request);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
}
