<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Admin - @yield('title')</title>

    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/sass/app.css') }}">

    @stack('scripts')
    @stack('styles')

    <script type="text/javascript">
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>
    <div class="header"></div>
    <div class="body">
        @yield('content')
    </div>
    <div class="footer"></div>
</body>
</html>

