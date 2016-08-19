<!DOCTYPE html>
<html lang="en">
<head>

    <title>Lindalë-Admin</title>

    @include('layouts.link')

</head>
<body>
	@include('layouts.pageloader')

	@include('layouts.header')

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">

				@include('layouts.admin.menu')

			</div>
	        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">

				@yield('content')

	        </div>
			</div>
		</div>
	</div>
</body>
</html>
