<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('common.meta')
    @include('common.favicon')
    @include('common.asset-link')
    <title>@yield('title', config('app.name', 'Lindalë'))</title>
    @yield('head')
</head>
<body>
<div id="app">
    <alert :messages="{{ json_encode($errors->all()) }}" type="alert-danger"></alert>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>