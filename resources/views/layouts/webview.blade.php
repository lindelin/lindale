<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.common.link')
    @if(app()->getLocale() == 'zh')
        <style>
            body {
                font-family: 'Nunito', 'Noto Sans', sans-serif !important;
                padding-top: 8px !important;
                padding-bottom: 8px !important;
            }important
        </style>
    @endif
</head>
<body>
<div class="container" id="app">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {!! $contents !!}
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
