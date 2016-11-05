{{ $project->Todos()->where('user_id', Auth::user()->id)->where('type_id', Definer::PUBLIC_TODO)->where('status_id', Definer::FINISH_STATUS_ID)->count() }}/{{ $project->Todos()->where('user_id', Auth::user()->id)->where('type_id', Definer::PUBLIC_TODO)->count() }}
{{-- 用户To-do集計(按项目) --}}
{{-- 用户当前项目完成待办数 ／ 用户当前项目总待办数 --}}