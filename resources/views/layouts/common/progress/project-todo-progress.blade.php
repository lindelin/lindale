<a href="{{ url('/project/'.$project->id.'/todo') }}" style="color: #000000;">
    {{ Counter::ProjectTodoFinishedCount($project) }}/{{ Counter::ProjectTodoCount($project) }}
</a>
{{-- 项目To-do集計 --}}
{{-- 当前项目完成待办数 ／ 当前项目总待办数 --}}