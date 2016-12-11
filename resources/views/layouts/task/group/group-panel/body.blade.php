<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#info-{{ $group->id }}" role="tab" data-toggle="tab">
            <span class="glyphicon glyphicon-info-sign"></span> <span class="hidden-xs hidden-sm">{{ trans('header.info') }}</span>
        </a>
    </li>
    <li role="presentation">
        <a href="#unfinished-{{ $group->id }}" role="tab" data-toggle="tab">
            <span class="glyphicon glyphicon-question-sign"></span> <span class="hidden-xs hidden-sm">{{ trans('task.unfinished') }}</span>
        </a>
    </li>
    <li role="presentation">
        <a href="#finished-{{ $group->id }}" role="tab" data-toggle="tab">
            <span class="glyphicon glyphicon-ok-sign"></span> <span class="hidden-xs hidden-sm">{{ trans('task.finish') }}</span>
        </a>
    </li>
    {{--<li role="presentation">
        <a href="#settings" role="tab" data-toggle="tab">
             <span class="hidden-xs hidden-sm">Settings</span>
        </a>
    </li>--}}
</ul>

<!-- Tab panes -->
<div class="tab-content">

    <div role="tabpanel" class="tab-pane active" id="info-{{ $group->id }}">

        <br>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th><span class="glyphicon glyphicon-tag"></span> {{ trans('task.type') }}</th>
                    <th><span class="glyphicon glyphicon-dashboard"></span> {{ trans('task.status') }}</th>
                    <th><i class="fa fa-hourglass-start" aria-hidden="true"></i> {{ trans('task.start_at') }}</th>
                    <th><i class="fa fa-hourglass-end" aria-hidden="true"></i> {{ trans('task.end_at') }}</th>
                    <th><i class="fa fa-refresh fa-spin fa-fw"></i> {{trans('task.updated')}}</th>
                    <th><span class="glyphicon glyphicon-time"></span> {{trans('task.created')}}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        {!! Colorable::label($group->Type->color_id, trans($group->Type->name)) !!}
                    </td>
                    <td>
                        {!! Colorable::label($group->Status->color_id, trans($group->Status->name)) !!}
                    </td>
                    <td>
                        @if($group->start_at != ''){{ $group->start_at }}@else{{ trans('task.none') }}@endif
                    </td>
                    <td>
                        @if($group->end_at != ''){{ $group->end_at }}@else{{ trans('task.none') }}@endif
                    </td>
                    <td>
                        {{ $group->updated_at }}
                    </td>
                    <td>
                        {{ $group->created_at }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        {!! Markdown::toHtml($group->information) !!}

    </div>

    <div role="tabpanel" class="tab-pane" id="unfinished-{{ $group->id }}">

        @if($group->Tasks()->where('is_finish', Definer::TASK_UNFINISHED)->count() > 0)
            @foreach($group->Tasks()->where('is_finish', Definer::TASK_UNFINISHED)->get() as $task)
                @include('layouts.task.common.task', ['task' => $task])
            @endforeach
        @else
            <h2 class="text-danger">NO DATA</h2>
        @endif

    </div>

    <div role="tabpanel" class="tab-pane" id="finished-{{ $group->id }}">

        @if($group->Tasks()->where('is_finish', Definer::TASK_FINISHED)->count() > 0)
            @foreach($group->Tasks()->where('is_finish', Definer::TASK_FINISHED)->get() as $task)
                @include('layouts.task.common.task', ['task' => $task])
            @endforeach
        @else
            <h2 class="text-danger">NO DATA</h2>
        @endif

    </div>

    {{--<div role="tabpanel" class="tab-pane" id="settings">
        ...
    </div>--}}
</div>