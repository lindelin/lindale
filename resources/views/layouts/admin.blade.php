<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lindalë-Admin</title>

    @include('layouts.link')

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
