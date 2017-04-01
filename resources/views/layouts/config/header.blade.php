<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 hidden-xs">
    @include('layouts.config.header.menu')
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs-block">
    <div class="btn-group">
        <button type="button" class="btn btn-default">
            {!! Definer::projectConfigMenu($mode) !!}
        </button>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ url("project/$project->id/config") }}">
                    <span class="glyphicon glyphicon-briefcase lindale-icon-color"></span> {{ trans('config.basic') }}
                </a>
            </li>
            <li>
                <a href="{{ url("project/$project->id/config/locale") }}">
                    <span class="glyphicon glyphicon-globe lindale-icon-color"></span> {{ trans('config.locale') }}
                </a>
            </li>
            <li>
                <a href="{{ url("project/$project->id/config/notification") }}">
                    <span class="glyphicon glyphicon-bell lindale-icon-color"></span> {{ trans('config.notification') }}
                </a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
                <a href="{{ url("project/$project->id/config/task/type") }}">
                    <span class="glyphicon glyphicon-tag lindale-icon-color"></span> {{ trans('config.task-type-config') }}
                </a>
            </li>
            <li>
                <a href="{{ url("project/$project->id/config/task/status") }}">
                    <span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> {{ trans('config.task-status-config') }}
                </a>
            </li>
        </ul>
    </div>
    <br>
    <br>
</div>
{{--
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs-block">
    <h4>{{ trans('user.settings') }}</h4>
    @include('layouts.settings.header.settings-nav-ss')
    <br>
</div>--}}
