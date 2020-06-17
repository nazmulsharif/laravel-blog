<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Laravel Blog Site')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('custom/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
</head>
<body>
	<div class="wrapper">
		<div class="top-header">
			<div class="social-icons">
				@foreach(App\Models\SocialIcon::all() as $icon)
					<a href="{{ $icon->link}}" target = {{ $icon->target }}><i class="{{$icon->class}}"></i></a>
				@endforeach
			</div>
		</div>
		@include('frontEnd.partials.nav')
		@yield('cover-photo')
		<div class="main-content mt-3">
			<div class="container">
					<div class="row">
						
						<div class="{{(Route::is('register')||Route::is('login'))?'col-md-12':'col-md-8'}}">
							@yield('content')
							@yield('pagination')
						</div>
						<div class="{{(Route::is('register')||Route::is('login'))?'d-none':'col-md-4'}}">
							@include('frontEnd.partials.sidebar')
						</div>
					</div>
			</div>
		</div>
		<div class="footer-area">
			@include('frontEnd.partials.footer')
		</div>
	</div>
	
	@include('frontEnd.partials.scripts')
	@yield('scripts')
</body>
</html>