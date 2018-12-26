<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.common.link')
    <title>@yield('title')</title>
    @yield('head')
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

    <div class="container" id="app">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        $(document).ready($("code").addClass("prettyprint"));
        $(document).ready($("pre").addClass("prettyprint"));
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
