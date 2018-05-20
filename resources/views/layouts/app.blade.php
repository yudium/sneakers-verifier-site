<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @stack('scripts')
    @stack('styles')
</head>
<body>
    @yield('content')
</body>
</html>

