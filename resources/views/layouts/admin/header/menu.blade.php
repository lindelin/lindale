<div class="list-group">

    <a href="{{ url('admin') }}" class="list-group-item @if($mode == 'center') active @endif">
        <span class="glyphicon glyphicon-home"></span> {{ trans('admin.center') }}
    </a>

    <a href="{{ url('admin/user') }}" class="list-group-item @if($mode == 'user') active @endif">
        <span class="glyphicon glyphicon-user"></span> {{ trans('admin.user') }}
    </a>

    <a href="{{ url('admin/logs') }}" class="list-group-item">
        <span class="glyphicon glyphicon-console"></span> {{ trans('admin.log-viewer') }}
    </a>

    {{--<a href="{{ url('admin/routes') }}" class="list-group-item">
        <span class="glyphicon glyphicon-road"></span> {{ trans('admin.route') }}
    </a>--}}

</div>