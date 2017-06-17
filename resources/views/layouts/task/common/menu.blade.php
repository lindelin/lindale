<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks') }}
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <ul class="list-group">
                <a href="{{ url('project/'.$project->id.'/task') }}" class="list-group-item @if($mode == 'group') active @endif">
                    <span class="badge">
                        {{ Counter::ProjectTaskGroupCount($project) }}
                    </span>
                    {{ trans('task.group') }}
                </a>
                <a href="{{ url('project/'.$project->id.'/task/all') }}" class="list-group-item @if($mode == 'all') active @endif">
                    <span class="badge">
                        {{ Counter::ProjectTaskFinishedCount($project) }}/{{ Counter::ProjectTaskCount($project) }}
                    </span>
                    {{ trans('task.all') }}
                </a>
                <a href="{{ url('project/'.$project->id.'/task/unfinished') }}" class="list-group-item @if($mode == 'unfinished') active @endif">
                    <span class="badge">
                        {{ Counter::ProjectTaskUnfinishedCount($project) }}
                    </span>
                    {{ trans('task.unfinished') }}
                </a>
                <a href="{{ url('project/'.$project->id.'/task/finished') }}" class="list-group-item @if($mode == 'finished') active @endif">
                    <span class="badge">
                        {{ Counter::ProjectTaskFinishedCount($project) }}
                    </span>
                    {{ trans('task.finish') }}
                </a>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span class="glyphicon glyphicon-tag"></span> {{ trans('task.type') }}
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse @if($in == 'type') in @endif" role="tabpanel" aria-labelledby="headingTwo">
            <ul class="list-group">
                @foreach($types as $type)
                    <a href="{{ url('project/'.$project->id.'/task/type/'.$type->id) }}" class="list-group-item @if($mode == 'type'.$type->id) active @endif">
                        <span class="badge">
                            {{ Counter::ProjectTypeTaskCount($project, $type, Definer::TASK_FINISHED) }}/{{ Counter::ProjectTypeTaskCount($project, $type) }}
                        </span>
                        {{ trans($type->name) }}
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span class="glyphicon glyphicon-sort-by-attributes-alt"></span> {{ trans('task.priority') }}
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse @if($in == 'priority') in @endif" role="tabpanel" aria-labelledby="headingThree">
            <ul class="list-group">
                @foreach($priorities as $priority)
                    <a href="{{ url('project/'.$project->id.'/task/priority/'.$priority->id) }}" class="list-group-item @if($mode == 'priority'.$priority->id) active @endif">
                        <span class="badge">
                            {{ Counter::ProjectPriorityTaskCount($project, $priority, Definer::TASK_FINISHED) }}/{{ Counter::ProjectPriorityTaskCount($project, $priority) }}
                        </span>
                        {{ trans($priority->name) }}
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> {{ trans('task.status') }}
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse @if($in == 'status') in @endif" role="tabpanel" aria-labelledby="headingFour">
            <ul class="list-group">
                @foreach($statuses as $status)
                    <a href="{{ url('project/'.$project->id.'/task/status/'.$status->id) }}" class="list-group-item @if($mode == 'status'.$status->id) active @endif">
                        <span class="badge">
                            {{ Counter::ProjectStatusTaskCount($project, $status) }}
                        </span>
                        {{ trans($status->name) }}
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>