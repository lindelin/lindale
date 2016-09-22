<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if (Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                </ul>
            @else
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;<!-- メニュー -->
                    <li>
                        <a href="{{ url('/home') }}">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/project') }}">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/project') }}" class="my-tooltip" data-placement="bottom" title="{{ trans('project.edit-project') }}">
                            <span class="glyphicon glyphicon-briefcase"></span>
                        </a>
                    </li>
                    <li><a href="{{ url('/project') }}"><span class="glyphicon glyphicon-tasks"></span></a></li>
                </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span>
                                <img alt="Brand" src="{{ asset('img/20166214.png') }}" style="padding: 0px;width: 22px;height: 22px;">
                            </span>
                             <span class="caret"></span>
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
                @endif
            </ul>
        </div>
    </div>
</nav>