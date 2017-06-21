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
            <table class="table table-hover table-bordered lindale-table">
                <tbody>

                    <tr>
                        <th><span class="glyphicon glyphicon-tag lindale-icon-color"></span> {{ trans('task.type') }}</th>
                        <th><span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ trans('task.status') }}</th>
                        <th><i class="fa fa-hourglass-start lindale-icon-color" aria-hidden="true"></i> {{ trans('task.start_at') }}</th>
                        <th><i class="fa fa-hourglass-end lindale-icon-color" aria-hidden="true"></i> {{ trans('task.end_at') }}</th>
                        <th><i class="fa fa-refresh fa-spin fa-fw lindale-icon-color"></i> {{trans('task.updated')}}</th>
                        <th><span class="glyphicon glyphicon-time lindale-icon-color"></span> {{trans('task.created')}}</th>
                    </tr>

                    <tr>
                        <td>
                            {!! Colorable::label($group->Type->color_id, trans($group->Type->name)) !!}
                        </td>
                        <td>
                            {{ $group->Status() }}
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

        @if($group->Tasks()->where('is_finish', config('task.unfinished'))->count() > 0)
            @foreach($group->Tasks()->where('is_finish', config('task.unfinished'))->orderBy('priority_id', 'desc')->get() as $task)
                @include('layouts.task.common.task', ['task' => $task])
            @endforeach
        @else
            <br>
            <div class="well well-home">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                        <h4 class="lindale-icon-color">NO DATA</h4>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <div role="tabpanel" class="tab-pane" id="finished-{{ $group->id }}">

        @if($group->Tasks()->where('is_finish', config('task.finished'))->count() > 0)
            @foreach($group->Tasks()->where('is_finish', config('task.finished'))->latest()->get() as $task)
                @include('layouts.task.common.task', ['task' => $task])
            @endforeach
        @else
            <br>
            <div class="well well-home">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                        <h4 class="lindale-icon-color">NO DATA</h4>
                    </div>
                </div>
            </div>
        @endif

    </div>

    {{--<div role="tabpanel" class="tab-pane" id="settings">
        ...
    </div>--}}
</div>