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
    <div class="header">
        <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
            <li><a href="{{ route('admin.list') }}">Admin List</a></li>
            <li><a href="{{ route('admin.create-new') }}">Admin Create New</a></li>
            <li><a href="{{ route('admin.verification-list') }}">Verification List</a></li>
            <li><a href="{{ route('admin.change') }}">Edit account</a></li>
            <li><a href="{{ route('admin.user-list') }}">User List</a></li>
            <li><a href="{{ route('admin.verificator-list') }}">Verificator List</a></li>
            <li><a href="{{ route('admin.verificator-create') }}">Create Verificator</a></li>
        </ul>
        </nav>
    </div>
    <div class="body">
        @yield('content')
    </div>
    <div class="footer"></div>
</body>
</html>

