<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="panel-title" style="font-size: 20px">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $group->id }}" aria-expanded="false" aria-controls="collapse{{ $group->id }}">
                <span class="glyphicon glyphicon-th-list"></span> {{ $group->title }}
            </a>
            <small>{!! Colorable::label($group->Status->color_id, trans($group->Status->name)) !!}</small>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="{{ Colorable::randomTextColor() }}">
            {{ trans($group->Type->name) }}#{{ $group->id }}
        </h4>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <i class="fa fa-hourglass-start" aria-hidden="true"></i> @if($group->start_at != ''){{ $group->start_at }}@else{{ trans('task.none') }}@endif
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <i class="fa fa-hourglass-end" aria-hidden="true"></i> @if($group->end_at != ''){{ $group->end_at }}@else{{ trans('task.none') }}@endif
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active {{ Colorable::progressColorClass($group->color_id) }}" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                 style="width: {{ Calculator::TaskGroupProgressCompute($group) }}%">
                {{ Calculator::TaskGroupProgressCompute($group) }}% Complete
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        {{ Counter::GroupTaskCount($group) }}　{{ trans('header.tasks') }}（{{ Counter::GroupTaskFinishCount($group) }} - {{ trans('task.finish') }} ，
        {{ Counter::GroupTaskUnfinishedCount($group) }} - {{ trans('task.unfinished') }}）
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <a href="{{ url('project/'.$project->id.'/task/group/edit/'.$group->id) }}"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a>
    </div>
</div>