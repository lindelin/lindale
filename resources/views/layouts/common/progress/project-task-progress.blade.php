<a href="{{ url('/project/'.$project->id.'/task/all') }}" style="color: #000000;">
    {{ Counter::ProjectTaskFinishedCount($project) }}/{{ Counter::ProjectTaskCount($project) }}
</a>
{{-- 项目任务集計 --}}
{{-- 当前项目完成任务数 ／ 当前项目总任务数 --}}