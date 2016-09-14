<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.common.link')
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>

    @include('layouts.common.header')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="{{ Colorable::lindale() }}">
                        @yield('panel-title')
                    </div>
                    <div class="panel-body">
                        @yield('panel-body')
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layouts.common.footer')

</body>
</html>
