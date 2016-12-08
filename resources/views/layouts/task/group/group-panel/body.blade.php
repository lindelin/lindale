<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#info" role="tab" data-toggle="tab">
            <span class="glyphicon glyphicon-info-sign"></span> <span class="hidden-xs hidden-sm">{{ trans('header.info') }}</span>
        </a>
    </li>
    <li role="presentation">
        <a href="#unfinished" role="tab" data-toggle="tab">
            <span class="glyphicon glyphicon-question-sign"></span> <span class="hidden-xs hidden-sm">{{ trans('task.unfinished') }}</span>
        </a>
    </li>
    <li role="presentation">
        <a href="#finished" role="tab" data-toggle="tab">
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

    <div role="tabpanel" class="tab-pane active" id="info">

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

    <div role="tabpanel" class="tab-pane" id="unfinished">

        <div class="bs-callout home-project-card {{ Colorable::randomCallOutColor() }}">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{ url("project/$project->id") }}">
                        <h4>
                            {{ $project->title }}
                        </h4>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong><a href="{{ url("project/$project->id") }}" class="{{ Colorable::randomTextColor() }}">@include('layouts.common.number.project')</a></strong>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong>
                        <span class="glyphicon glyphicon-tasks"></span> 0/0&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-check"></span> @include('layouts.common.progress.project-todo-progress')&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-calendar"></span> 0/0&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-dashboard"></span> {{ $project->progress }}%&nbsp;&nbsp;&nbsp;
                    </strong>
                </div>
            </div>
        </div>

    </div>

    <div role="tabpanel" class="tab-pane" id="finished">
        ...
    </div>

    {{--<div role="tabpanel" class="tab-pane" id="settings">
        ...
    </div>--}}
</div>