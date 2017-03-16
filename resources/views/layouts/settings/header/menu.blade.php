<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h4 class="panel-title">{{ trans('user.settings') }}</h4>
    </div>
    <!-- List group -->
    <ul class="list-group">

        <a href="{{ url('settings/profile') }}" class="list-group-item @if($mode == 'profile') active @endif">
            <span class="glyphicon glyphicon-user"></span> {{ trans('user.public-profile') }}
        </a>

        <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-lock"></span> {{ trans('user.account') }}
        </a>

        <a href="{{ url('settings/locale') }}" class="list-group-item @if($mode == 'locale') active @endif">
            <span class="glyphicon glyphicon-globe"></span> {{ trans('config.locale') }}
        </a>

        <a href="{{ url('settings/notification') }}" class="list-group-item @if($mode == 'notification') active @endif">
            <span class="glyphicon glyphicon-bell"></span> {{ trans('config.notification') }}
        </a>

        <a href="{{ url('settings/oauth/authorized') }}" class="list-group-item @if($mode == 'authorized') active @endif">
            <i class="fa fa-cubes" aria-hidden="true"></i> {{ trans('config.authorized-clients') }}
        </a>

    </ul>
</div>

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h4 class="panel-title">{{ trans('config.developer-config') }}</h4>
    </div>
    <!-- List group -->
    <ul class="list-group">

        <a href="{{ url('settings/developer/oauth/application') }}" class="list-group-item @if($mode == 'developer') active @endif">
            <i class="fa fa-puzzle-piece" aria-hidden="true"></i> {{ trans('config.oauth-app') }}
        </a>

        <a href="{{ url('settings/developer/oauth/personal') }}" class="list-group-item @if($mode == 'personal') active @endif">
            <i class="fa fa-id-card" aria-hidden="true"></i> {{ trans('config.oauth-personal') }}
        </a>

    </ul>
</div>