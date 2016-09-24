<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.common.link')
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>

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


</body>
</html>
