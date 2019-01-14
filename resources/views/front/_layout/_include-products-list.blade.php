				<div id="{{ $list->slug }}" class="bar">
					<a href="{{ asset('asset/picture/product/'.$list->picture) }}" title="{{ title_case($list->name) }}">
						<div id="img" title="{{ title_case($list->name) }}" style="background-image: url('{{ asset('asset/picture/product/'.$list->picture) }}');"></div>
					</a>
					<div class="text-left">
						<h3>{{ title_case($list->name) }}</h3>
						{!! $list->content !!}
					</div>
				</div>