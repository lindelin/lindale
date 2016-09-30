<?php

namespace App\Http\Middleware;

use Closure;

class ProjectAuth
{
    /**
     * 认证用户是否参与该项目
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $project = $request->route('project');
        if($project->user_id === $request->user()->id){
            return $next($request);
        }else if($project->sl_id === $request->user()->id){
            return $next($request);
        }else if($project->Users()->find($request->user()->id)){
            return $next($request);
        } else{
            return redirect()->back()->withErrors(trans('errors.unauthorized'));
        }
    }
}
