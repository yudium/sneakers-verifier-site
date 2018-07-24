<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Snoort - @yield('title')</title>
    
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/sass/app.css') }}">

    @stack('scripts')
    @stack('styles')

    <script type="text/javascript">
        function opRequest(stt) {
            if (stt == 'open') {
                $('#new-request').show();
            } else {
                $('#new-request').hide();
            }
        }
        function opLogin(stt) {
            if (stt == 'open') {
                $('#new-login').show();
            } else {
                $('#new-login').hide();
            }
        }

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
        <div class="place bdr-bottom">
            <div class="main">
                <div class="mn-1">
                    <a href="{{ url('/') }}">
                        <div class="logo">
                            <span class="ctn-main-font ctn-int-color ctn-standar">Sno</span><span class="ctn-main-font ctn-min-color ctn-standar">ort</span>
                        </div>
                    </a>
                </div>
                <div class="mn-2">
                    <div class="menu-ctn">
                        <ul class="menu-header">
                            <a href="{{ url('/verification/list') }}">
                                <li>Reviewed</li>
                            </a>
                            <a href="{{ url('/verification/list/unreviewed') }}">
                                <li>Unreviewed</li>
                            </a>
                            <a href="{{ route('public.verificator.list') }}">
                                <li>Verificators</li>
                            </a>
                        </ul>
                    </div>
                    <div class="menu-ctn">
                        <div class="menu-init">
                            @if (Auth::guard('web_admin')->user() || Auth::guard('web_verificator')->user() || Auth::guard('web_user')->user())
                                @if (Auth::guard('web_admin')->user())
                                    <a href="{{ url('/admin/dashboard') }}">
                                        <button class="btn btn-radius btn-primary-color" style="margin-right: 10px;">
                                            <span class="fa fa-lg fa-home"></span>
                                            <span>Dashboard</span>
                                        </button>
                                    </a>
                                    <a href="{{ url('/admin/logout') }}">
                                        <button class="btn btn-primary-color btn-circle">
                                            <span class="fa fa-lg fa-power-off"></span>
                                        </button>
                                    </a>
                                @endif
                                @if (Auth::guard('web_verificator')->user())
                                    <a href="{{ url('/verificator/'.Auth::guard('web_verificator')->user()->id) }}">
                                        <button class="btn btn-radius btn-primary-color" style="margin-right: 10px;">
                                            <span class="fa fa-lg fa-user"></span>
                                        </button>
                                    </a>
                                    <a href="{{ url('/verificator/logout') }}">
                                        <button class="btn btn-primary-color btn-circle">
                                            <span class="fa fa-lg fa-power-off"></span>
                                        </button>
                                    </a>
                                @endif
                                @if (Auth::guard('web_user')->user())
                                    <a href="{{ url('/user/'.Auth::id()) }}">
                                        <button class="btn btn-circle btn-primary-color" style="margin-right: 10px;">
                                            <span class="fa fa-lg fa-user"></span>
                                        </button>
                                    </a>
                                    <button class="btn btn-radius btn-main-color" onclick="opRequest('open')">
                                        <span class="fa fa-lg fa-plus-circle"></span>
                                        <span>Verification</span>
                                    </button>
                                @endif
                            @else
                                <button class="btn btn-radius btn-primary-color" style="margin-right: 10px;" onclick="opLogin('open')">
                                    Login
                                </button>
                                <a href="{{ url('/register') }}">
                                    <button class="btn btn-radius btn-main-color">
                                        Register
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::guard('web_admin')->user() || Auth::guard('web_verificator')->user() || Auth::guard('web_user')->user())
        <div class="popup" id="new-request" onclick="opRequest('hide')">
            <div class="place compose">
                <div class="cmp-1" style="border-right: 2px rgba(0,0,0,0.1) dashed;">
                    <a href="{{ url('/verification/new-request/image-based') }}">
                        <div class="content">
                            <div class="icn fa fa-lg fa-images"></div>
                            <div class="ttl">Image Based</div>
                        </div>
                    </a>
                </div>
                <div class="cmp-2">
                    <a href="{{ url('/verification/new-request/link-based') }}">
                        <div class="content">
                            <div class="icn fa fa-lg fa-link"></div>
                            <div class="ttl">Link Based</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="popup" id="new-login" onclick="opLogin('hide')">
            <div class="place sign">
                <div class="cmp-1" style="border-right: 2px rgba(0,0,0,0.1) dashed;">
                    <a href="{{ url('/login') }}">
                        <div class="content">
                            <div class="icn fa fa-lg fa-sign-in-alt"></div>
                            <div class="ttl">User Login</div>
                        </div>
                    </a>
                </div>
                <div class="cmp-2" style="border-right: 2px rgba(0,0,0,0.1) dashed;">
                    <a href="{{ url('/verificator/login') }}">
                        <div class="content">
                            <div class="icn fa fa-lg fa-sign-in-alt"></div>
                            <div class="ttl">Verificator Login</div>
                        </div>
                    </a>
                </div>
                <div class="cmp-3">
                    <a href="{{ url('/admin/login') }}">
                        <div class="content">
                            <div class="icn fa fa-lg fa-sign-in-alt"></div>
                            <div class="ttl">Admin Login</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endif
    <div class="body">
        @include('message')
        @yield('content')
    </div>
    <div class="footer"></div>
</body>
</html>

