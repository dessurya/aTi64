@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI | Service</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI | Service">
	<meta name="description" content="">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<link rel="stylesheet" href="{{ asset('asset/css/products.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/news.css') }}">
	<style type="text/css">
		/* service */
			#service{
				position: relative;
				background-color: rgb(248, 244, 225);
				color: rgb(57, 46, 39);
				padding: 60px 0 80px;
				overflow-x: hidden;
				overflow-y: hidden;
			}
			#service img#absen{
				position: absolute;
				top: 50px;
				left: -210px;
				width: 110%;
			}
			#service h1{
				margin: 0 auto;
				margin-bottom: 40px;
			}
			#service .text-center p{
				width: 65%;
				margin: 0 auto;
				margin-bottom: 40px;
			}
			#service .tab{
				width: 90%;
				margin: 0 auto;
			}
			#service .tab .row .col{
				height: auto;
			}
			#service .tab .row .icon.col{
				width: 20%;
				vertical-align: top;
				text-align: center;
			}
			#service .tab .row .content.col{
				width: 80%;
				vertical-align: bottom;
			}
			#service .tab .row .col img{
				width: 75%;
			}
		/* service */
		/*responsif*/
			@media (max-width: 812px) { /* Mobile landscape and potrait */
				#service .tab, #service .tab .row{
					display: block;
					position: relative;
				}
				#service .tab .row .icon.col, #service .tab .row .content.col{
					display: block;
					width: 100%;
				}
				#service .tab .row .icon.col{
					position: absolute;
					top: -250px;
				}
				#service .tab .row .content.col{
					margin-top: 250px;
					text-align: justify;
				}
			}
			@media screen and (max-width: 812px) and (min-width: 528px) { /* Mobile landscape */
				#service .tab .row .icon.col h3{
					margin: 0;
				}
				#service .tab .row .col img{
					width: 40%;
				}
			}
		/*responsif*/
	</style>
@endsection

@section('body')

	<div id="service">
		<img id="absen" src="{{ asset('asset/picture-default/absen-pict-service.png') }}">
		<div class="wrapper">
			<div class="text-center">
				<h1>Service</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
				</p>
			</div>
			<div class="tab">
				<div class="row">
					<div class="icon col">
						<img src="{{ asset('asset/picture-default/servis1.png') }}">
						<h3>Service 1</h3>
					</div>
					<div class="content col">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
						</p>
					</div>
				</div>
			</div>
			<div class="tab">
				<div class="row">
					<div class="content col">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
						</p>
					</div>
					<div class="icon col">
						<img src="{{ asset('asset/picture-default/servis2.png') }}">
						<h3>Service 2</h3>
					</div>
				</div>
			</div>
			<div class="tab">
				<div class="row">
					<div class="icon col">
						<img src="{{ asset('asset/picture-default/servis3.png') }}">
						<h3>Service 3</h3>
					</div>
					<div class="content col">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('front._layout._include-products')

	@include('front._layout._include-news')
@endsection

@section('include_js')
@endsection
