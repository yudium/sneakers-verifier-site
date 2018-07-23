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
<div class="dashboard">
    <div class="side">
        <ul class="menu">
            <div class="hd">
                <span class="ctn-main-font ctn-white-color ctn-small">Options</span>
            </div>
            
            <a href="{{ route('admin.dashboard') }}">
                <li>
                    <span class="icn fa fa-lg fa-home"></span>
                    <span class="ttl">Dashboard</span>
                </li>
            </a>

            <div class="hd">
                <span class="ctn-main-font ctn-white-color ctn-16px ctn-thin">New</span>
            </div>
            <a href="{{ route('admin.create-new') }}">
                <li>
                    <span class="icn fa fa-lg fa-plus"></span>
                    <span class="ttl">Create Admin</span>
                </li>
            </a>
            <a href="{{ route('admin.verificator-create') }}">
                <li>
                    <span class="icn fa fa-lg fa-plus"></span>
                    <span class="ttl">Create Verificator</span>
                </li>
            </a>
            
            <div class="hd">
                <span class="ctn-main-font ctn-white-color ctn-16px ctn-thin">Lists</span>
            </div>
            <a href="{{ route('admin.list') }}">
                <li>
                    <span class="icn fa fa-lg fa-list"></span>
                    <span class="ttl">Admin List</span>
                </li>
            </a>
            <a href="{{ route('admin.user-list') }}">
                <li>
                    <span class="icn fa fa-lg fa-list"></span>
                    <span class="ttl">User List</span>
                </li>
            </a>
            <a href="{{ route('admin.verificator-list') }}">
                <li>
                    <span class="icn fa fa-lg fa-list"></span>
                    <span class="ttl">Verificator List</span>
                </li>
            </a>
            <a href="{{ route('admin.verification-list') }}">
                <li>
                    <span class="icn fa fa-lg fa-list"></span>
                    <span class="ttl">Verification List</span>
                </li>
            </a>
            
            <div class="hd">
                <span class="ctn-main-font ctn-white-color ctn-16px ctn-thin">Setting</span>
            </div>
            <a href="{{ route('admin.change') }}">
                <li>
                    <span class="icn fa fa-lg fa-pencil-alt"></span>
                    <span class="ttl">Edit account</span>
                </li>
            </a>
            <div class="hd">
                <span class="ctn-main-font ctn-white-color ctn-16px ctn-thin">Others</span>
            </div>
            <a href="{{ url('/admin/logout') }}">
                <li>
                    <span class="icn fa fa-lg fa-power-off"></span>
                    <span class="ttl">Logout</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="body">
        <div class="padding-10px"></div>
        @yield('content')
        <div class="padding-10px"></div>
    </div>
</div>
</body>
</html>

