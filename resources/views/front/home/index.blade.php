@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI">
	<meta name="description" content="PT. ANUGERAH ALAM ABADI - {{ Str::words(strip_tags(__('_main_content.about')), 25, ' ...') }}">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl-carousel/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl-carousel/owl.theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl-carousel/owl.transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/home.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/products.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/service.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/news.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/animate-it/animations.css') }}">
@endsection

@section('body')
	<div id="banner">
		@foreach($banner as $list)
		<div class="item">
			<div id="img" style="background-image: url('{{ asset('asset/picture/banner/'.$list->picture) }}');"></div>
		</div>
		@endforeach
	</div>

	<div id="about_us" class="animatedParent animateOnce">
		<div id="absen-mid">
			<div id="centered">
				<img class="animated bounceInDown slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-1.png') }}">
			</div>
		</div>
		<img id="absen-pict-left" class="animated bounceInLeft slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-left.png') }}">
		<img id="absen-pict-right" class="animated bounceInRight slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about-right.png') }}">
		<img id="absen-pict" class="animated flipInX slower delay-750" src="{{ asset('asset/picture-default/absen-pict-about.png') }}">

		<div class="wrapper">
			<div class="tab">
				<div class="row">
					<div class="col text-center">
						<h1 class="animated growIn slower delay-250">About Us</h1>

						<p class="animated fadeInUp delay-500">
							{{ Str::words(strip_tags(__('_main_content.about')), 65, ' ...') }}
						</p>
						<div class="animated bounceIn delay-750">
							<a class="links" href="{{ route('aboutus') }}">
								Detail
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('front._layout._include-products')

	@if(count($partner) >= 1)
	<div id="partners" class="animatedParent animateOnce">
		<img id="top" src="{{ asset('asset/picture-default/partner-top.png') }}">
		<img id="bottom" src="{{ asset('asset/picture-default/partner-bottom.png') }}">
		<div class="wrapper text-center">
			<h1 class="animated growIn slower delay-250">Partners</h1>
			
			<div id="list-wrap">
				@foreach($partner as $list)
				<img class="animated shakeUp slower delay-250" src="{{ asset('asset/picture/partner/'.$list->picture) }}">
				@endforeach
			</div>
			<div class="animated bounceIn delay-1000">
				<a class="links" href="{{ route('partners') }}">
					Detail
				</a>
			</div>
		</div>
	</div>
	@endif

	<?php // @include('front._layout._include-service') ?>

	@include('front._layout._include-news')
@endsection

@section('include_js')
	<script src="{{ asset('vendors/animate-it/animate-it.js') }}"></script>

	<script type="text/javascript" src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
	<script type="text/javascript">
		$("#banner").owlCarousel({
			navigation : false,
			items: 1,
			singleItem:true,
			pagination:true,
			autoPlay: 5000,
		    stopOnHover:false
		});
	</script>
@endsection
