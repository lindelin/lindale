<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.common.link')
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body {
            background-image: url({{ asset('img/top/login.jpg') }});
            background-repeat: no-repeat;
            background-position: 0 50%;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding-bottom: 0;
            padding-top: 0;
        }
        .form-control {
            height: 40px;
            background-color: rgba(255,255,255,.8);
            border: none;
        }
        .form-control:focus {
            border: none;
            outline: 0;
            box-shadow: none;
        }
        .form-group {
            font-size: 16px;
            color: #00184a;
        }
        .well {
            background: rgba(255,255,255,.8);
            border: none;
        }
        a {
            color: #00184a;
        }
        .dropdown-menu {
            background: rgba(255,255,255,.8);
        }

    </style>
</head>
<body>

    @include('layouts.pageloader')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well well-home">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-success btn-xs" >
                                <span class="glyphicon glyphicon-arrow-left"></span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-5 col-md-5 col-lg-5">
                        </div>
                        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                            <a href="{{ url('/') }}" class="thumbnail" style="border: none;background: none;">
                                <img src="{{ asset('img/logo.png') }}">
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

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
