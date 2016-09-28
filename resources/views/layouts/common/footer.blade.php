<nav class="navbar-inverse navbar-fixed-bottom hidden-xs" role="navigation">
    <div class="container-fluid">
        <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div align="center" style="color: #ffffff">
                &copy; {{ date('Y') }}
                <a style="color: #ffffff" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                All rights reserved.
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="currentTime" align="center" style="color: #ffffff"></div>
        </div>

    </div>
</nav>

<div class="container-fluid visible-xs-block">
    <div class="row">
        <hr>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="currentTime" align="center"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div align="center">
                &copy; {{ date('Y') }}
                <a href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                All rights reserved.
            </div>
        </div>
    </div>
</div>

