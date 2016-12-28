{{-- meta --}}
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- cdn css--}}
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href="//cdn.bootcss.com/bootstrap-markdown/2.10.0/css/bootstrap-markdown.min.css" rel="stylesheet">
<link href="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/css/bootstrap-select.min.css" rel="stylesheet">
<link href="//cdn.bootcss.com/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<link href="//cdn.bootcss.com/font-awesome/4.7.0/fonts/fontawesome-webfont.svg" rel="stylesheet">
{{-- cdn js--}}
<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.2.0/js/transition.js"></script>
<script src="//cdn.bootcss.com/bootstrap-markdown/2.10.0/js/bootstrap-markdown.js"></script>
<script src="//cdn.bootcss.com/bootstrap-markdown/2.10.0/js/bootstrap-markdown.min.js"></script>
<script src="//cdn.bootcss.com/marked/0.3.6/marked.js"></script>
{{--<script src="//cdn.bootcss.com/markdown.js/0.5.0/markdown.min.js"></script>--}}
<script src="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/js/bootstrap-select.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/js/i18n/defaults-en_US.min.js"></script>
<script src="//cdn.bootcss.com/moment.js/2.14.1/moment.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
{{-- local css --}}
<link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
{{-- local icon --}}
<link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon" />
<link rel="bookmark" href="{{ asset('/favicon.ico') }}" type="image/x-icon" />
<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" href="{{ asset('/favicon/apple-touch-icon.png') }}" />
<link rel="icon" type="image/png" href="{{ asset('/favicon/apple-touch-icon.png') }}" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="{{ asset('/favicon/apple-touch-icon.png') }}" />
<meta name="msapplication-square70x70logo" content="{{ asset('/favicon/apple-touch-icon.png') }}" />
<meta name="msapplication-square150x150logo" content="{{ asset('/favicon/apple-touch-icon.png') }}" />
<meta name="msapplication-wide310x150logo" content="{{ asset('/favicon/apple-touch-icon.png') }}" />
<meta name="msapplication-square310x310logo" content="{{ asset('/favicon/apple-touch-icon.png') }}" />apple-touch-icon.png
{{-- local js --}}

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