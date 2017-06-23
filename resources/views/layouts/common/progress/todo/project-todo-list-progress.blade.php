{{ $list->Todos()->where('type_id', config('todo.public'))->where('status_id', config('todo.status.finished'))->count() }}/{{ $list->Todos()->where('type_id', config('todo.public'))->count() }}
{{-- 项目To-do集計(按列表) --}}
{{-- 当前列表完成待办数 ／ 当前列表总待办数 --}}