<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.common.link')
    <script src="{{ asset('dhtmlxGantt/codebase/dhtmlxgantt.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('dhtmlxGantt/codebase/ext/dhtmlxgantt_marker.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('dhtmlxGantt/codebase/locale/locale_'.session('lang').'.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('dhtmlxGantt/codebase/ext/dhtmlxgantt_smart_rendering.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('dhtmlxGantt/codebase/ext/dhtmlxgantt_tooltip.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="https://export.dhtmlx.com/gantt/api.js"></script>
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>

    @include('layouts.pageloader')

    @include('layouts.common.header')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts.common.footer')

    <script>
        $(document).ready($("code").addClass("prettyprint"));
        $(document).ready($("pre").addClass("prettyprint"));
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
