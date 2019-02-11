<div id="nav" class="">
	<div id="wrapper">
		<div id="logo">
			<div class="tab">
				<div class="row">
					<div class="col">
						<img src="{{ asset('asset/picture-default/i-aaa.png') }}">
					</div>
					<div class="col">
						<h1>PT. ANUGERAH ALAM ABADI</h1>
						<div id="burger">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="list">
			<div class="tab">
				<div class="row">
					<div class="col">
						<a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
							Home
						</a>
					</div>
					<div class="col">
						<a class="{{ Route::is('aboutus') ? 'active' : '' }}" href="{{ route('aboutus') }}">
							About Us
						</a>
					</div>
					<div class="col">
						<a class="{{ Route::is('industry', 'category', 'product') ? 'active' : '' }}" href="{{ route('industry') }}">
							Products
						</a>
					</div>
					<div class="col">
						<a class="{{ Route::is('partners') ? 'active' : '' }}" href="{{ route('partners') }}">
							Partner
						</a>
					</div>
					<div class="col" style="display: none;">
						<a class="{{ Route::is('service') ? 'active' : '' }}" href="{{ route('service') }}">
							Service & Consulting
						</a>
					</div>
					{!! (new App\Http\Controllers\FrontController)->getNewsNav() !!}
					<div class="col">
						<a class="{{ Route::is('contactus') ? 'active' : '' }}" href="{{ route('contactus') }}">
							Contact Us
						</a>
					</div>
					<div class="col" style="display: none;">
						<a data-url="{{ route('pdcdwnld') }}" target="_blank">
							<img src="{{ asset('asset/picture-default/download.png') }}">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>