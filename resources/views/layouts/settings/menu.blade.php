<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">{{ trans('user.settings') }}</div>
    <!-- List group -->
    <ul class="list-group">

        <a href="{{ url('admin/user') }}" class="list-group-item @if($mode == 'profile') active @endif">
            <span class="glyphicon glyphicon-user"></span> {{ trans('user.public-profile') }}
        </a>

        <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-lock"></span> {{ trans('user.account') }}
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