<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 hidden-xs">
    @include('layouts.config.header.menu')
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs-block">
    <div class="dropdown">
        <button class="btn btn-default btn-block btn-lg dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            {{ $mode }}
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>
    <br>
</div>
{{--
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs-block">
    <h4>{{ trans('user.settings') }}</h4>
    @include('layouts.settings.header.settings-nav-ss')
    <br>
</div>--}}
