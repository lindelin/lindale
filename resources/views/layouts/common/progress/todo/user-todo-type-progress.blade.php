{{ Auth::user()->Todos()->where('type_id', $type)->where('status_id', Definer::FINISH_STATUS_ID)->count() }}/{{ Auth::user()->Todos()->where('type_id', $type)->count() }}
{{-- 用户To-do集計(按类型) --}}
{{-- 用户当前类型完成待办数 ／ 用户当前类型总待办数 --}}