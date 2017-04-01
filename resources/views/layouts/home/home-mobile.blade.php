<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs-block">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" @if($mode != 'project') class="active" @endif style="width: 50%;">
                    <a href="{{ url('/home') }}"><div align="center">{{ trans('header.my') }}{{ trans('header.home') }}</div></a>
                </li>
                <li role="presentation" @if($mode == 'project') class="active" @endif style="width: 50%;">
                    <a href="{{ url('/home/project') }}"><div align="center">{{ trans('header.my') }}{{ trans('header.project') }}</div></a>
                </li>
            </ul>
        </div>
    </div>
    <br>

    @if($mode == 'project')
        @include('layouts.home.phone.project')
    @else
        @include('layouts.home.phone.profile')
        @include('layouts.home.status-bar')
        @include('layouts.home.progress-bar')
        @include('layouts.home.progress-status')
    @endif

</div>