{{ Counter::UserTodoTypeFinishCount(Auth::user(), $type) }}/{{ Counter::UserTodoTypeCount(Auth::user(), $type) }}
{{-- 用户To-do集計(按类型) --}}
{{-- 用户当前类型完成待办数 ／ 用户当前类型总待办数 --}}