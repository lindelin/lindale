{{ $project->Todos()->where('type_id', config('todo.public'))->where('status_id', $status->id)->count() }}
{{-- 项目To-do集計(按状态) --}}
{{-- 当前状态待办数 --}}