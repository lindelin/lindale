<div class="row visible-xs-block">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" @if($mode == "center") class="active" @endif>
                <a href="{{ url('admin') }}">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>

            <li role="presentation" @if($mode == "user") class="active" @endif>
                <a href="{{ url('admin/user') }}">
                    <span class="glyphicon glyphicon-user"></span>
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