@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI | Products - {{ title_case($category->getIndustry->name) }} - {{ title_case($category->name) }}</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI | Products - {{ title_case($category->getIndustry->name) }} - {{ title_case($category->name) }}">
	<meta name="description" content="">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<link rel="stylesheet" href="{{ asset('asset/css/service.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/baguetteBox/baguetteBox.min.css') }}">
	<style type="text/css">
		#more{
			position: relative;
			background-color: rgb(247, 241, 214);
			padding-bottom: 90px;
		}
		#more p{
			margin: 0;
			padding: 20px 0;
		}
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
			margin-top: 60px;
		}
		#category #bar-wrapper .bar{
			position: relative;
			width: 30%;
			display: inline-grid;
			margin: 0 auto 20px;
			padding: 0 10px;
		}
		#category #bar-wrapper .bar #img{
			margin: 0 auto;
			width: 100%;
			height: 300px;
			border: solid 3px rgb(58, 48, 41);
			background-color: rgb(255, 252, 208);

			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		#category #bar-wrapper .bar h3{
			display: none;
		}
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
				<h1>{{ title_case($category->name) }}</h1>
				<span>
					<a href="{{ route('industry') }}">Product</a> 
					/ 
					<a href="{{ route('category', ['slug' => $category->getIndustry->slug]) }}">{{ title_case($category->getIndustry->name) }}</a>
					/
					<a href="{{ route('product', ['slug' => $category->getIndustry->slug, 'subslug' => $category->slug]) }}">{{ title_case($category->name) }}</a>
				</span>
			</div>
			<div class="clearfix"></div>
			{!! $category->content !!}
			
			<div id="bar-wrapper" class="text-center">
				@foreach($category->getProduct('Y',6) as $list)
				@include('front._layout._include-products-list')
				@endforeach
			</div>
		</div>
	</div>

	<div id="more" class="text-center">
		<p><label style="color: red"></label></p>
		<a id="getmore" class="links" href="{{ route('productaddlist', ['slug' => $category->getIndustry->slug, 'subslug' => $category->slug]) }}">
			More
		</a>
	</div>

	@include('front._layout._include-service')
@endsection

@section('include_js')
	<script type="text/javascript" src="{{ asset('vendors/baguetteBox/baguetteBox.min.js') }}"></script>
	<script type="text/javascript">
		baguetteBox.run('#category #bar-wrapper');
	</script>
	<script type="text/javascript">
		$(function(){
			var page = 1;
			$('#more p').hide();
			$(document).on('click', 'a#getmore.links', function(){
				page += 1;
				var url = $(this).attr('href')+'?page='+page;
		        $.ajax({
		            url: url,
		            type: 'get',
		            beforeSend: function() {
		                $('#more p').show()
		                $('#more p label').html('Please Wait ... Currently Taking Your Request ... Please Wait ...');
		            },
		            success: function(data) {
		            	if (data.html) {
		            		window.setTimeout(function() {
		                        $('#category .wrapper #bar-wrapper').append(data.html);
		                    }, 350);
		            		window.setTimeout(function() {
			                    baguetteBox.run('#category #bar-wrapper');
		                    }, 750);
		            	}
		            	else if(!data.html){
		            		window.setTimeout(function() {
		                		$('a#getmore.links').hide();
		                    }, 350);
		                    window.setTimeout(function() {
				                $('#more p label').html('All Data Has Been Loaded');
		                    }, 475);
		            	}
	                    window.setTimeout(function() {
	                        $('#more p').hide();
	                    }, 1875);
		            }
		        });
		        return false;
			});
		});
	</script>
@endsection
