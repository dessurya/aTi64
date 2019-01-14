@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI | About Us</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI | About Us">
	<meta name="description" content="PT. ANUGERAH ALAM ABADI - {{ Str::words(strip_tags(__('_main_content.about')), 25, ' ...') }}">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<link rel="stylesheet" href="{{ asset('asset/css/about-us-page.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/products.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/news.css') }}">
@endsection

@section('body')

	<div id="profile">
		<div id="absen-mid">
			<div id="centered">
				<img class="animated bounceInDown slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-1.png') }}">
			</div>
		</div>
		<img id="absen-pict-left" class="animated bounceInLeft slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-left-1.png') }}">
		<img id="absen-pict-right" class="animated bounceInRight slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-right-1.png') }}">

		<div class="wrapper">
			<h1>Profile</h1>
			<div class="tab">
				<div class="row">
					<div class="col">
						{!! __('_main_content.about') !!}
					</div>
					<div class="col">
						<div id="img" style="background-image: url('{{ asset('asset/picture-default/profile.jpg') }}');"></div>
					</div>
				</div>
			</div>					
		</div>
	</div>
	<div id="vmh">
		<div id="absen-mid">
			<div id="centered">
				<img class="animated bounceInDown slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-2.png') }}">
			</div>
		</div>
		<img id="absen-pict-left" class="animated bounceInLeft slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-left-2.png') }}">
		<img id="absen-pict-right" class="animated bounceInRight slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-right-2.png') }}">
		<div class="wrapper">
			<div class="tab">
				<div class="row">
					<div class="col">
						<h1>Visi</h1>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</p>
					</div>
					<div class="col">
						<h1>Misi</h1>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</p>
					</div>
				</div>
			</div>
			<h1>History</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</p>
		</div>
	</div>

	@include('front._layout._include-products')

	@include('front._layout._include-news')
@endsection

@section('include_js')
@endsection
