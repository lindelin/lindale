<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.common.link')
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>

    @include('layouts.pageloader')

    @include('layouts.common.header')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well well-home lindale-background">
                    <div class="row">
                        <div class="col-xs-4 col-sm-5 col-md-5 col-lg-5">
                        </div>
                        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                            <a class="thumbnail" style="border: none;">
                                <img src="{{ asset('img/logo.jpg') }}">
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-5 col-md-5 col-lg-5">
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            @yield('panel-body')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layouts.common.footer')

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
