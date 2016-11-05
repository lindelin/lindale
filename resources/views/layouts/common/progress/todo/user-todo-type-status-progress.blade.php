{{ Auth::user()->Todos()->where('type_id', $type)->where('status_id', $status->id)->count() }}
{{-- 用户To-do集計(按状态) --}}
{{-- 用户当前状态待办数 --}}