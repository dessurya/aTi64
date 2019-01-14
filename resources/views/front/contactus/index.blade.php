@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI | Contact Us</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI | Contact Us">
	<meta name="description" content="">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<style type="text/css">
		#maps{
			position: relative;
			padding-bottom: 40px;
		}
		#maps h1{
			border-bottom: solid .5px;
		}
		#maps #color{
			position: absolute;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 280px;
			background-color: rgb(128, 112, 85);
		}
		#maps iframe{
			width: 100%;
			height: 480px;
		}
	</style>
@endsection

@section('body')

	<div id="maps">
		<div id="color"></div>
		<div class="wrapper">
			<h1>Contact Us</h1>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6664270097594!2d106.82496411431308!3d-6.17539239552917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonumen+Nasional!5e0!3m2!1sid!2sid!4v1537160340910" frameborder="0" style="border:0" allowfullscreen></iframe>

		</div>
	</div>
@endsection

@section('include_js')
@endsection
