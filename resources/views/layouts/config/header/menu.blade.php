<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">{{ trans('config.project-config') }}</div>
    <!-- List group -->
    <ul class="list-group">

        <a href="{{ url("project/$project->id/config") }}" class="list-group-item @if($mode == 'basic') active @endif">
            <span class="glyphicon glyphicon-briefcase"></span> {{ trans('config.basic') }}
        </a>

        <a href="{{ url("project/$project->id/config/locale") }}" class="list-group-item @if($mode == 'locale') active @endif">
            <span class="glyphicon glyphicon-globe"></span> {{ trans('config.locale') }}
        </a>

        <a href="{{ url("project/$project->id/config/notification") }}" class="list-group-item @if($mode == 'notification') active @endif">
            <span class="glyphicon glyphicon-bell"></span> {{ trans('config.notification') }}
        </a>

        {{--

        <a href="#" class="list-group-item">
            Porta ac consectetur ac
        </a>

        <a href="#" class="list-group-item">
            Vestibulum at eros
        </a>--}}
    </ul>
</div>