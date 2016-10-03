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

           {{-- <li role="presentation" @if($mode == "todo") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-check"></span>
                </a>
            </li>

            <li role="presentation" @if($mode == "progress") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-dashboard"></span>
                </a>
            </li>

            <li role="presentation" @if($mode == "wiki") class="active" @endif>
                <a href="#">
                    <span class="glyphicon glyphicon-book"></span>
                </a>
            </li>
--}}
        </ul>
    </div>
</div>