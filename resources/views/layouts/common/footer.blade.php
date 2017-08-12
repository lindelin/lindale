<nav class="navbar-inverse navbar-fixed-bottom lindale-footer hidden-xs" role="navigation">
    <div class="container-fluid" style="padding-top: 2px;">
        <div class="row">
            <div class="col-xs-0 col-sm-0 col-md-4 col-lg-4">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div align="center" class="lindale-color">
                    Powered by <a href="http://www.lindelin.org" target="_blank">Lindelin</a>
                    &copy; {{ date('Y') }}
                    {{ config('app.name') }}

                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="currentTime lindale-color" align="center"></div>
            </div>
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

