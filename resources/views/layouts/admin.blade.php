<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lindalë-Admin</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
</head>
<body>

	@include('layouts.header')

	<div class="container">
		<div class="row">
			<div class="col-md-2">

	        @include('layouts.admin.menu')

			</div>
	        <div class="col-md-10">

	        @yield('content')

	        </div>
			</div>
		</div>
	</div>
</body>
</html>
