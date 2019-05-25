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
    <loader ref="loader"></loader>
    <div class="container-scroller">
        @include('home._header')
        <div class="container-fluid page-body-wrapper">
            @include('home._settings_side_bar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('common.footer')
            </div>
        </div>
    </div>
</div>
@include('common.lang_support')
@include('common.js_links')
@yield('js')
</body>
</html>