<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('layouts.common.profile-img')
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="lindale-color">{{ Auth::user()->name }}<br> <small>{{ Auth::user()->email }}</small></h3>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if(Auth::user()->content)
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ Auth::user()->content }}
                </div>
            </div>
        @else
            <div class="list-group">
                <a href="{{ url('/settings/profile') }}" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> {{ trans('user.add-content') }}</a>
            </div>
        @endif

    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <a href="{{ url('/settings/profile') }}" class="btn btn-success btn-block">{{ trans('user.edit-profile') }}</a>
    </div>
</div>

<hr>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

       @if(Auth::user()->company)
           <p><i class="fa fa-university" aria-hidden="true"></i> {{ Auth::user()->company }}</p>
       @endif
       @if(Auth::user()->location)
           <p><span class="glyphicon glyphicon-globe"></span> {{ Auth::user()->location }}</p>
       @endif
       @if(Auth::user()->github)
           <p><i class="fa fa-github-alt" aria-hidden="true"></i> <a href="{{ Auth::user()->github }}">GitHub</a></p>
       @endif
       @if(Auth::user()->slack)
           <p><i class="fa fa-slack" aria-hidden="true"></i> <a href="{{ Auth::user()->slack }}">Slack</a></p>
       @endif
       @if(Auth::user()->facebook)
           <p><i class="fa fa-facebook-square" aria-hidden="true"></i> <a href="{{ Auth::user()->facebook }}">Facebook</a></p>
       @endif
       @if(Auth::user()->qq)
           <p><i class="fa fa-qq" aria-hidden="true"></i> {{ Auth::user()->qq }}</p>
       @endif

	</div>
</div>