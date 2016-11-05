{{ $list->Todos()->where('type_id', Definer::PUBLIC_TODO)->where('status_id', Definer::FINISH_STATUS_ID)->count() }}/{{ $list->Todos()->where('type_id', Definer::PUBLIC_TODO)->count() }}
{{-- 项目To-do集計(按列表) --}}
{{-- 当前列表完成待办数 ／ 当前列表总待办数 --}}