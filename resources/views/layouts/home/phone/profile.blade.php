<div class="row">
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        @include('layouts.common.profile-img')
    </div>
    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h4>{{ Auth::user()->name }}<br> <small>{{ Auth::user()->email }}</small></h4>
            </div>
            @if(Auth::user()->github)
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <a href="{{ Auth::user()->github }}"><i class="fa fa-github-alt" aria-hidden="true"></i></a>
                </div>
            @endif
            @if(Auth::user()->slack)
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <a href="{{ Auth::user()->slack }}"><i class="fa fa-slack" aria-hidden="true"></i></a>
                </div>
            @endif
            @if(Auth::user()->facebook)
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <a href="{{ Auth::user()->facebook }}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                </div>
            @endif
            @if(Auth::user()->qq)
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <a href="{{ Auth::user()->qq }}"><i class="fa fa-qq" aria-hidden="true"></i></a>
                </div>
            @endif
        </div>
    </div>
</div>