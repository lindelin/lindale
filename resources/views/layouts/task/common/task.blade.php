<div class="bs-callout {{ Colorable::getCallOutColor($task->color_id) }}">
    <div class="row">
    	<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
            @if((int)$task->is_finish === Definer::TASK_FINISHED)
                @include('layouts.task.common.finish-edit', ['status_edit_url' => '#', 'model' => $task])
            @else
                @include('layouts.task.common.status-edit', ['status_edit_url' => '#', 'model' => $task])
            @endif
    	</div>
        <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{ url('project/'.$project->id.'/task/show/'.$task->id) }}">
                        <h4>
                            {{ $task->title }}
                        </h4>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong>
                        <a href="{{ url('project/'.$project->id.'/task/type/'.$task->Type->id) }}" class="{{ Colorable::randomTextColor() }}">
                            @include('layouts.common.number.task')
                        </a>
                    </strong>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <span class="glyphicon glyphicon-user"></span>
                    <span class="hidden-xs hidden-sm">{{ trans('task.user') }}：</span>
                    @if($task->User != null){{ $task->User->name }}@else{{ trans('task.none') }}@endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">{{ trans('task.cost') }}：</span>
                    @if((int)$task->cost !== null){{ $task->cost }} {{ trans('task.hour') }}@else{{ trans('task.none') }}@endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <span class="glyphicon glyphicon-th-list"></span>
                    <span class="hidden-xs hidden-sm">{{ trans('task.group') }}：</span>
                    @if($task->Group != null){{ $task->Group->title }}@else{{ trans('task.none') }}@endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">{{ trans('task.priority') }}：</span>
                    {{ trans($task->Priority->name) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">{{ trans('task.start_at') }}：</span>
                    @if($task->start_at != ''){{ $task->start_at }}@else{{ trans('task.none') }}@endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">{{ trans('task.end_at') }}：</span>
                    @if($task->end_at != ''){{ $task->end_at }}@else{{ trans('task.none') }}@endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="progress" style="margin-bottom: 0px;">
                        <div class="progress-bar progress-bar-striped active {{ Colorable::progressColorClass($task->color_id) }}"
                             style="width: {{ $task->progress }}%">
                            {{ $task->progress }}% Complete
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>