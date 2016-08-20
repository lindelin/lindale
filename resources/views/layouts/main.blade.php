<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title')</title>

    @include('layouts.link')

</head>
<body>

    @include('layouts.pageloader')

    @yield('content')

</body>
</html>
