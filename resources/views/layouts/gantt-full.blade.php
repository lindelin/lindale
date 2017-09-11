<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.common.link')
    <script src="{{ asset('dhtmlxGantt/codebase/dhtmlxgantt.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('dhtmlxGantt/codebase/ext/dhtmlxgantt_marker.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('dhtmlxGantt/codebase/locale/locale_'.session('lang').'.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('dhtmlxGantt/codebase/ext/dhtmlxgantt_smart_rendering.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('dhtmlxGantt/codebase/ext/dhtmlxgantt_tooltip.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="https://export.dhtmlx.com/gantt/api.js" type="text/javascript" charset="utf-8"></script>
    <title>@yield('title')</title>
    @yield('head')
    <style type="text/css" media="screen">
        html, body{
            margin:0px;
            padding:0px;
            width:100%;
            height:100%;
            overflow:hidden;
        }
    </style>
    @if(app()->getLocale() == 'zh')
        <style>
            body {
                font-family: 'Nunito', 'Noto Sans', sans-serif !important;
            }
        </style>
    @endif
</head>
<body>

    @include('layouts.pageloader')

    @yield('content')

    @include('layouts.common.footer')

    <script>
        $(document).ready($("code").addClass("prettyprint"));
        $(document).ready($("pre").addClass("prettyprint"));
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
