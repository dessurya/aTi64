@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI | News - {{ title_case($detail->name) }}</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI | News - {{ title_case($detail->name) }}">
	<meta name="description" content="">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<link rel="stylesheet" href="{{ asset('asset/css/news.css') }}">
	<style type="text/css">
		#detail{
			position: relative;
		}
		#detail #img{
			width: 100%;
			height: 460px;

			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
		}
		#news{
			padding-top: 20px;
		}
		#news h1,
		#detail h1{
			border-bottom: solid .5px;
		}
		#more{
			position: relative;
			padding: 0 0 60px;
		}
	</style>
@endsection

@section('body')

	<div id="detail">
		<div class="wrapper">
			<h1>{{ title_case($detail->name) }}</h1>
			<div id="img" style="background-image: url('{{ asset('asset/picture/news/'.$detail->picture) }}');"></div>
			{!! $detail->content !!}
		</div>
	</div>

	@include('front._layout._include-news')

	<div id="more" class="text-center">
		<p><label style="color: red"></label></p>
		<a id="getmore" class="links" href="{{ route('newslistadd') }}">
			More
		</a>
	</div>
@endsection

@section('include_js')
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
		                        $('#news .wrapper #bar-wrapper').append(data.html);
		                    }, 350);
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
	                    }, 2875);
		            }
		        });
		        return false;
			});
		});
	</script>
@endsection
