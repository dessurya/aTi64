@extends('front._layout.basic')

@section('title')
	<title>PT. ANUGERAH ALAM ABADI | Products</title>
@endsection

@section('meta')
	<meta name="title" content="PT. ANUGERAH ALAM ABADI | Products">
	<meta name="description" content="">
	<meta name="keywords" content=""/>
@endsection

@section('include_css')
	<link rel="stylesheet" href="{{ asset('asset/css/products.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/news.css') }}">
@endsection

@section('body')
	@include('front._layout._include-products')

	@include('front._layout._include-news')
@endsection

@section('include_js')
@endsection
