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
            <div class="col-md-6 col-md-offset-3">
                <br><br><br><br>
                <div class="well well-home lindale-background">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a class="thumbnail" style="border: none;">
                                <img src="{{ asset('img/logo.jpg') }}">
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
