	<div id="products" class="animatedParent animateOnce">
		<div id="absen-mid">
			<div id="centered">
				<img class="animated bounceInDown slower delay-750" src="{{ asset('asset/picture-default/absen-pict-product.png') }}">
			</div>
		</div>
		<div class="wrapper text-center">
			<h1 class="animated fadeInUpShort delay-500">Products</h1>
			<p class="animated fadeInDownShort delay-500" style="display: none;">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
			</p>

			<div id="bar-wrapper">
				@foreach($industry as $list)
				<div class="bar animated bounceInDown delay-750">
					<a href="{{ route('category', ['slug' => $list->slug]) }}"><h3>{{ $list->name }}</h3></a>
					<div class="text-center">
						<img src="{{ asset('asset/picture/industry/'.$list->picture) }}">
					</div>
				</div>
				@endforeach
			</div>
			@if(!Route::is('industry'))
			<div class="animated bounceIn delay-1000">
				<a class="links" href="{{ route('industry') }}">
					Detail
				</a>
			</div>
			@endif
		</div>
	</div>