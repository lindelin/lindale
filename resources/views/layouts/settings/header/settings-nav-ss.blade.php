<div class="row visible-xs-block">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" @if($mode == "profile") class="active" @endif>
                <a href="{{ url('settings/profile') }}">
                    <span class="glyphicon glyphicon-user"></span>
                </a>
            </li>

            <li role="presentation" @if($mode == "account") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-lock"></span>
                </a>
            </li>

            <li role="presentation" @if($mode == "locale") class="active" @endif>
                <a href="{{ url('settings/locale') }}">
                    <span class="glyphicon glyphicon-globe"></span>
                </a>
            </li>

            <li role="presentation" @if($mode == "notification") class="active" @endif>
                <a href="{{ url('settings/notification') }}">
                    <span class="glyphicon glyphicon-bell"></span>
                </a>
            </li>

            <li role="presentation" @if($mode == "authorized") class="active" @endif>
                <a href="{{ url('settings/oauth/authorized') }}">
                    <i class="fa fa-cubes" aria-hidden="true"></i>
                </a>
            </li>

            <li role="presentation" @if($mode == "developer") class="active" @endif>
                <a href="{{ url('settings/developer/oauth/application') }}">
                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                </a>
            </li>

            <li role="presentation" @if($mode == "personal") class="active" @endif>
                <a href="{{ url('settings/developer/oauth/personal') }}">
                    <i class="fa fa-id-card" aria-hidden="true"></i>
                </a>
            </li>

        </ul>
    </div>
</div>