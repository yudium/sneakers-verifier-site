<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/sass/app.css') }}">
    <title>Snoort - @yield('title')</title>

    @stack('scripts')
    @stack('styles')
</head>
<body>
	<div class="header">
		<div class="place">
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
						    <li class="active">Home Feeds</li>
						    <li>Sneakers</li>
						    <li>Verificators</li>
						</ul>
					</div>
					<div class="menu-ctn">
						<div class="menu-init">
							<a href="{{ url('/login') }}">
								<button class="btn btn-primary-color" style="margin-right: 10px;">
			    					Login
			    				</button>
			    			</a>
			    			<a href="{{ url('/register') }}">
			    				<button class="btn btn-main-color">
			    					Register
			    				</button>
			    			</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="body">
		@yield('content')
	</div>
	<div class="footer"></div>
</body>
</html>

