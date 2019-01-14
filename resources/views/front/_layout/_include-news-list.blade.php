				@foreach($news as $list)
				<div class="bar">
					<div id="img" style="background-image: url('{{ asset('asset/picture/news/'.$list->picture) }}');"></div>
					<p><strong>{{ title_case($list->name) }}</strong> | {!! Str::words(strip_tags($list->content), 20, ' <a href="'. route('newsdetail', ['slug' => $list->slug]) .'"> <strong>Read More</strong>...</a> ') !!}</p>
				</div>
				@endforeach