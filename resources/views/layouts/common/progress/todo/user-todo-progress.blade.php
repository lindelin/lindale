{{ Auth::user()->Todos()->where('status_id', Definer::FINISH_STATUS_ID)->count() }}/{{ Auth::user()->Todos()->count() }}
{{-- 用户To-do集計 --}}
{{-- 用户总完成待办数 ／ 用户总待办数 --}}