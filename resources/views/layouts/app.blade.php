<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>checkUp - @yield('title')</title>

	@include('partials._stylesheets')
	@yield('stylesheets')
</head>
<body>
	@include('partials._navbar')
	<div id="app">
		<div class="jumbotron jumbotron-fluid">
			@yield('topPart')
		</div>
		<div class="container mt-4" style="padding: 0;">
			@yield('content')
		</div>
		@yield('secondContent')
	</div>
	@include('partials._scripts')
	@yield('scripts')
</body>
</html>
