<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('common.meta')
    @include('common.favicon')
    @include('common.asset_links')
    <title>@yield('title', config('app.name', 'Lindalë'))</title>
    @yield('head')
</head>
<body>
<div id="app">
    @include('common.system_notification')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            @yield('content')
        </div>
    </div>
</div>
@include('common.js_links')
@yield('js')
</body>
</html>