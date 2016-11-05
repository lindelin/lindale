{{ $project->todos()->where('type_id', Definer::PUBLIC_TODO)->where('status_id', Definer::FINISH_STATUS_ID)->count() }}/{{ $project->todos()->where('type_id', Definer::PUBLIC_TODO)->count() }}
{{-- 项目To-do集計 --}}
{{-- 当前项目完成待办数 ／ 当前项目总待办数 --}}