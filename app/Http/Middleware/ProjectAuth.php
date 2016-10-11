<?php

namespace App\Http\Middleware;

use Closure;
use Admin;

class ProjectAuth
{
    /**
     * 认证用户是否参与该项目.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $project = $request->route('project');
        if ($project->user_id === $request->user()->id) {
            return $next($request);
        } elseif ($project->sl_id === $request->user()->id) {
            return $next($request);
        } elseif ($project->Users()->find($request->user()->id)) {
            return $next($request);
        } elseif (Admin::is_super_admin($request->user())) {
            return $next($request);
        } else {
            return redirect()->back()->withErrors(trans('errors.unauthorized'));
        }
    }
}
