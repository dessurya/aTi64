<div class="modal-header">
	<button 
		type="button" 
		class="close" 
		data-dismiss="modal" 
		aria-label="Close"
	>
		<span aria-hidden="true">×</span>
	</button>
	<h4 class="modal-title">
		{{ title_case(str_replace('-', ' ', $index)) }} <small>Form{{ $data != null ? ' Update '.title_case($data->name) : ' Add' }}</small>
	</h4>
</div>
<div class="modal-body">
	<form id="add" action="{{ route('adm.mid.content.form.store', ['index'=>$index]) }}{{ $data != null ? '?id='.$data->id : '' }}" class="form-horizontal form-label-left">
		<div id="add_respone" class="alert alert-info alert-dismissible fade in" role="alert" style="display: none;"></div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
				Name <span class="required">*</span>
				<p class="name error"></p>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input 
					name="name" 
					type="text" 
					id="name" 
					class="form-control col-md-7 col-xs-12"
					required 
					value="{{ $data != null ? $data->name : '' }}"
				>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">
				Content
				<p class="content error"></p>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<textarea name="content" id="content" class="form-control col-md-7 col-xs-12">{{ $data != null ? $data->content : '' }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="picture">
				Picture
				<p class="picture error"></p>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input name="picture" type="file" id="picture" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
		@if($data != null and $data->picture)
			<div class="text-center" style="margin: 20px auto;">
				<a href="{{ asset('asset/picture/'.$index.'/'.$data->picture) }}" target="_blank">
					<img src="{{ asset('asset/picture/'.$index.'/'.$data->picture) }}" style="max-width: 280px; max-height: 160px;">
				</a>
			</div>
		@endif
		<div class="ln_solid"></div>
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>
	</form>
</div>