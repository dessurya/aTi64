<!DOCTYPE html>
<html>
<head>
	
	@yield('title')

	<meta charset="utf-8">
	<meta http-equiv="Content-Language" content="{{ App::getLocale() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')

    <meta name="google-site-verification" content="WoEFPm5mEA4IkWE-EDSpSDrG7zg1ETt3LppVMm5Y5Mg" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="all"/>

	<link rel="icon" type="image/png" href="{{ asset('asset/picture-default/i-aaa.png') }}" />
	
	<link rel="stylesheet" href="{{ asset('asset/css/public.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/font/_font.css') }}">
	@if(!route::is('home'))
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/public-sub.css') }}">
	@endif
	@yield("include_css")
	
	<script src="{{ asset('jquery/jquery-3.2.0.min.js') }}"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	@include('front._layout.navigasibar')
	@yield("body")
	@include('front._layout.footer')
	<script type="text/javascript" src="{{ asset('asset/js/public.js') }}"></script>
	@yield("include_js")
</body>
</html>