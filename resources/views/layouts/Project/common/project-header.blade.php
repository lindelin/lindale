<div class="row">
    <div class="col-xs-6 col-sm-7 col-md-7 col-lg-8">
        <h4 class="lindale-color" style="margin-top: 0px;">
            <span class="glyphicon glyphicon-briefcase lindale-icon-color"></span>
            <strong>{{ $project->title }}</strong> <small>@include('layouts.common.number.project')</small>
        </h4>
    </div>
    <div class="col-xs-6 col-sm-5 col-md-5 col-lg-4" align="right">
        <div class="btn-group">
            <a href="{{ url('project/'.$project->id.'/task') }}" type="button" class="btn btn-default btn-sm lindale-color">
                <span class="glyphicon glyphicon-tasks lindale-icon-color"></span> <strong class="hidden-xs">{{ trans('header.tasks') }}</strong>
            </a>
            <a type="button" class="btn btn-default btn-sm">
                {{ \App\Counter::ProjectTaskFinishedCount($project) }}/{{ \App\Counter::ProjectTaskCount($project) }}
            </a>
        </div>
        <div class="btn-group">
            <a href="{{ url('project/'.$project->id.'/todo') }}" type="button" class="btn btn-default btn-sm lindale-color">
                <span class="glyphicon glyphicon-check lindale-icon-color"></span> <strong class="hidden-xs">TODO</strong>
            </a>
            <a type="button" class="btn btn-default btn-sm">
                {{ Counter::ProjectTodoFinishedCount($project) }}/{{ Counter::ProjectTodoCount($project) }}
            </a>
        </div>
    </div>
</div>
@include('layouts.Project.project-nav')
<br>
@include('layouts.common.errors-all')
@include('layouts.common.succeed')