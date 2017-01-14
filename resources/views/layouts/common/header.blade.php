<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" height="20"src="{{ asset('img/logo.png') }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if (Auth::guest())
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('auth.home') }}">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                        <a href="{{ url('/') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-home"></span> {{ trans('auth.home') }}
                        </a>
                    </li>
                    <li class="dropdown visible-xs-block">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-globe"></span> {{ trans('header.'.Config::get('app.locale')) }} <strong class="caret"></strong>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('lang', ['lang' => 'en']) }}">English</a>
                            </li>
                            <li>
                                <a href="{{ route('lang', ['lang' => 'ja']) }}">日本語</a>
                            </li>
                            <li>
                                <a href="{{ route('lang', ['lang' => 'zh']) }}">中文</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <br class="visible-xs-block">
                    <li class="dropdown visible-xs-block">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span>
                                @if(Auth::user()->photo != '')
                                    <img src="{{ asset('storage/'.Auth::user()->photo) }}" style="width: 50px;height: 50px;">
                                @else
                                    <img src="{{ asset(Colorable::lindaleProfileImg(Auth::user()->email)) }}" style="width: 50px;height: 50px;">
                                @endif
                            </span>
                            <h3 style="color: #9e9e9e">{{ Auth::user()->name }}</h3>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ trans('auth.logout') }}
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <hr class="visible-xs-block">
                    <li>
                        <a href="{{ url('/home') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('auth.home') }}">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                        <a href="{{ url('/home') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-home"></span> {{ trans('auth.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/project') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('header.project') }}">
                            <span class="glyphicon glyphicon-briefcase"></span>
                        </a>
                        <a href="{{ url('/project') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-briefcase"></span> {{ trans('header.project') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/task') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('header.tasks') }}">
                            <span class="glyphicon glyphicon-tasks"></span>
                        </a>
                        <a href="{{ url('/task') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-tasks"></span> {{ trans('header.tasks') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/todo') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="TODO">
                            <span class="glyphicon glyphicon-check"></span>
                        </a>
                        <a href="{{ url('/todo') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-check"></span> TODO
                        </a>
                    </li>
                    {{--<li>
                        <a href="{{ url('/schedule') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('header.schedule') }}">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </a>
                        <a href="{{ url('/schedule') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-calendar"></span> {{ trans('header.schedule') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/time-sheet') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('header.time-sheet') }}">
                            <span class="glyphicon glyphicon-time"></span>
                        </a>
                        <a href="{{ url('/time-sheet') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-time"></span> {{ trans('header.time-sheet') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/message') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('header.message') }}">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </a>
                        <a href="{{ url('/message') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-envelope"></span> {{ trans('header.message') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/bbs') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('header.bbs') }}">
                            <span class="glyphicon glyphicon-comment"></span>
                        </a>
                        <a href="{{ url('/bbs') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-comment"></span> {{ trans('header.bbs') }}
                        </a>
                    </li>--}}
                    <li class="dropdown visible-xs-block">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-globe"></span> {{ trans('header.'.Config::get('app.locale')) }} <strong class="caret"></strong>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('lang', ['lang' => 'en']) }}">English</a>
                            </li>
                            <li>
                                <a href="{{ route('lang', ['lang' => 'ja']) }}">日本語</a>
                            </li>
                            <li>
                                <a href="{{ route('lang', ['lang' => 'zh']) }}">中文</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/settings/profile') }}" class="visible-xs-block">
                            <span class="glyphicon glyphicon-cog"></span> {{ trans('header.settings') }}
                        </a>
                    </li>
                    @if(Admin::is_super_admin(Auth::user()))
                        <li>
                            <a href="{{ url('/admin') }}" class="visible-xs-block">
                                <span class="glyphicon glyphicon-wrench"></span> {{ trans('header.admin') }}
                            </a>
                        </li>
                    @endif
                    <br class="visible-xs-block">
                    <br class="visible-xs-block">
                </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right hidden-xs">
                @if(Auth::guest())
                @else

                    <li>
                        <a href="{{ url('/settings/profile') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('header.settings') }}">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>

                    @if(Admin::is_super_admin(Auth::user()))
                        <li>
                            <a href="{{ url('/admin') }}" class="my-tooltip hidden-xs" data-placement="bottom" title="{{ trans('header.admin') }}">
                                <span class="glyphicon glyphicon-wrench"></span>
                            </a>
                        </li>
                    @endif
                @endif
                <!-- 言語切り替え -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-globe"></span> {{ trans('header.'.Config::get('app.locale')) }} <strong class="caret"></strong>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('lang', ['lang' => 'en']) }}">English</a>
                        </li>
                        <li>
                            <a href="{{ route('lang', ['lang' => 'ja']) }}">日本語</a>
                        </li>
                        <li>
                            <a href="{{ route('lang', ['lang' => 'zh']) }}">中文</a>
                        </li>
                    </ul>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">{{ trans('auth.login') }}</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="{{ trans('auth.logout') }}">
                            <span>
                                @if(Auth::user()->photo != '')
                                    <img src="{{ asset('storage/'.Auth::user()->photo) }}" style="padding: 0px;width: 22px;height: 22px;">
                                @else
                                    <img src="{{ asset(Colorable::lindaleProfileImg(Auth::user()->email)) }}" style="padding: 0px;width: 22px;height: 22px;">
                                @endif
                            </span>
                             <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ trans('auth.logout') }}
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>