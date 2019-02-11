@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI | Partners</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI | Partners">
	<meta name="description" content="">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<link rel="stylesheet" href="{{ asset('asset/css/news.css') }}">
	<style type="text/css">
		#partners{
			position: relative;
		}
		#partners p{
			width: 75%;
			margin: 0 auto;
			margin-bottom: 80px;
		}
		#partners a{
			text-decoration: none;
			font-family: 'Kanit-Regular';
		}
		#partners #list-wrap{
			position: relative;
		}
		#partners #list-wrap .bar{
			position: relative;
			display: inline-block;
			width: 23%;
			margin: 0 auto 10px;
		}
		
		#partners #list-wrap .bar .tab .row .col{
			width: 100%;
			height: 160px;
			vertical-align: middle;
		}
		#partners #list-wrap .bar img{
			width: 65%;
			height: auto;
		}
		#partners #absen-mid{
			position: absolute; 
			width: 100%; 
			top: 0px;
		}
		#partners #absen-mid #centered{
			position: relative; 
			text-align: center; 
			margin: 0 auto;
		}
		#partners #absen-mid #centered img{
			width: 95%;
		}
		#partners img#absen-pict-left{
			position: absolute;
			bottom: 0;
			left: 0;
		}
		#partners img#absen-pict-right{
			position: absolute;
			bottom: 0;
			right: 0;
		}
		/*responsif*/
			@media (max-width: 812px) { /* Mobile landscape and potrait */
				#partners #list-wrap .bar{
					width: 100%;
				}
			}
			@media screen and (max-width: 812px) and (min-width: 528px) { /* Mobile landscape */
				#partners #list-wrap .bar{
					width: 47%;
				}
			}
		/*responsif*/
	</style>
@endsection

@section('body')
	<div id="partners">
		<div id="absen-mid">
			<div id="centered">
				<img class="animated bounceInDown slower delay-750" src="{{ asset('asset/picture-default/partner-absen-top.png') }}">
			</div>
		</div>
		<img id="absen-pict-left" class="animated bounceInLeft slower delay-750" src="{{ asset('asset/picture-default/partner-absen-left.png') }}">
		<img id="absen-pict-right" class="animated bounceInRight slower delay-750" src="{{ asset('asset/picture-default/partner-absen-right.png') }}">
		<div class="wrapper text-center">
			<h1>Partners</h1>
			<p style="display: none;">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
			</p>
			
			<div id="list-wrap" class="text-center">
				@foreach($partner as $list)
				<div class="bar text-center">
					<div class="tab">
						<div class="row">
							<div class="col">
								<img src="{{ asset('asset/picture/partner/'.$list->picture) }}">
							</div>
						</div>
					</div>
					@if($list->web)
					<a href="{{ $list->web }}">{{ $list->web }}</a>
					@endif
				</div>
				@endforeach
			</div>
		</div>
	</div>

	@include('front._layout._include-news')
@endsection

@section('include_js')
	
@endsection
