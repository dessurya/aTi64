@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI | Products - {{ title_case($industry->name) }}</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI | Products - {{ title_case($industry->name) }}">
	<meta name="description" content="">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<link rel="stylesheet" href="{{ asset('vendors/baguetteBox/baguetteBox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/service.css') }}">
	<style type="text/css">
		#category{
			position: relative;
			background-color: rgb(247, 241, 214);
			padding-bottom: 30px;
			overflow: hidden;
		}
		#category #absen-mid{
			position: absolute; 
			width: 100%; 
			top: 0;
		}
		#category #absen-mid #centered{
			position: relative; 
			text-align: center; 
			margin: 0 auto;
		}
		#category #absen-mid #centered img{
			width: 90%;
		}
		#category #head h1{
			margin: 0;
			padding: 10px 0;
		}
		#category #head span{
			position: relative;
			top: -30px;
			float: right;
		}
		#category #head span a{
			text-decoration: none;
			color: unset;
		}
		#category #bar-wrapper{
			position: relative;
			padding-top: 40px;
		}
		#category #bar-wrapper .bar{
			position: relative;
			width: 30%;
			display: inline-grid;
			margin: 0 auto 20px;
			padding: 0 15px;
		}
		#category #bar-wrapper .bar #img{
			margin: 0 auto;
			width: 80%;
			height: 240px;
			border: solid 3px rgb(58, 48, 41);
			border-bottom: none;
			background-color: rgb(255, 252, 208);

			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		#category #bar-wrapper .bar a{
			text-decoration: none;
			color: unset;
		}
		#category #bar-wrapper .bar h3{
			position: relative;
			margin: 0 auto;
			/*width: 70%;*/
			padding: 10px 30px;
			background-color: rgb(58, 48, 41);
			color: white;
		}
		/*#category #bar-wrapper .bar h3:before, #category #bar-wrapper .bar h3:after {
		 content: "";
		 position: absolute;
		 display: block;
		 bottom: 0px;
		 border: 25px solid rgb(58, 48, 41);
		 z-index: 0;
		}
		#category #bar-wrapper .bar h3:before {
		 left: -30px;
		 border-right-width: 20px;
		 border-left-color: transparent;
		}
		#category #bar-wrapper .bar h3:after {
		 right: -30px;
		 border-left-width: 20px;
		 border-right-color: transparent;
		}*/
		/*responsif*/
			@media (max-width: 812px) { /* Mobile landscape and potrait */
				#category #head span{
					top: -10px;
				}
				#category #bar-wrapper .bar{
					width: 90%;
				}
			}
		/*responsif*/
	</style>
@endsection

@section('body')
	<div id="category">
		<div id="absen-mid">
			<div id="centered">
				<img class="animated bounceInDown slower delay-750" src="{{ asset('asset/picture-default/absen-pict-product.png') }}">
			</div>
		</div>
		<div class="wrapper">
			<div id="head">
				<h1>{{ title_case($industry->name) }}</h1>
				<span>
					<a href="{{ route('industry') }}">Product</a> 
					/ 
					<a href="{{ route('category', ['slug' => $industry->slug]) }}">{{ title_case($industry->name) }}</a>
				</span>
			</div>
			<div class="clearfix"></div>
			{!! $industry->content !!}
			
			<div id="bar-wrapper" class="text-center">
				@foreach($industry->getCategory('Y') as $list)
				<div class="bar">
					<a href="{{ asset('asset/picture/category/'.$list->picture) }}" title="{{ title_case($list->name) }}">
						<div id="img" title="{{ title_case($list->name) }}" style="background-image: url('{{ asset('asset/picture/category/'.$list->picture) }}');"></div>
					</a>
					<div style="position: relative;"><h3><a href="{{ route('product', ['slug' => $industry->slug, 'subslug' => $list->slug]) }}">
						{{ title_case($list->name) }}
					</a></h3></div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	@include('front._layout._include-service')
@endsection

@section('include_js')
	<script type="text/javascript" src="{{ asset('vendors/baguetteBox/baguetteBox.min.js') }}"></script>
	<script type="text/javascript">
		baguetteBox.run('#category #bar-wrapper');
	</script>
@endsection
