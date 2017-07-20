{{-- meta --}}
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- cdn js--}}
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
{{-- Charts CDN --}}
{!! Charts::assets() !!}
{{-- css --}}
<link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css">
<link href="/vendor/swatkins/gantt/css/gantt.css" rel="stylesheet" type="text/css">
{{-- js --}}
<script src="{{ asset('js/lib.js') }}"></script>
{{-- icon --}}
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('/favicon-32x32.png') }}" sizes="32x32">
<link rel="icon" type="image/png" href="{{ asset('/favicon-16x16.png') }}" sizes="16x16">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
<link rel="mask-icon" href="{{ asset('/safari-pinned-tab.svg') }}" color="#00184a">
<meta name="apple-mobile-web-app-title" content="Lindalë">
<meta name="application-name" content="Lindalë">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="{{ asset('/mstile-144x144.png') }}">
<meta name="theme-color" content="#ffffff">
{{-- facebook meta --}}
<meta property="og:image" content="{{ asset('/og-image.jpg') }}">
<meta property="og:image:width" content="1852">
<meta property="og:image:height" content="970">
<meta property="og:title" content="Lindalë - The Project Manager For Everyone">
<meta property="og:description" content="Lindalë is an Open Source software for complex project management. Experience a soujourn transcending elegant features comprehensively designed for a team of any size.">
<meta property="og:url" content="https://lindale.tk">
<!-- Scripts -->
<script>
    //時間
    $(function(){
        setInterval(function(){
            $(".currentTime").text(new Date().toLocaleString());
        },100);
    });
    //工具提示
    $(function (){
        $("[data-toggle='tooltip']").tooltip();
    });
    //工具提示
    $(document).ready(function(){
        $('.my-tooltip').tooltip();
    });
    //令牌
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>