{{ $project->Todos()->where('type_id', Definer::PUBLIC_TODO)->where('status_id', $status->id)->count() }}
{{-- 项目To-do集計(按状态) --}}
{{-- 当前状态待办数 --}}