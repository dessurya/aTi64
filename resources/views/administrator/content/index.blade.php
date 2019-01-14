@extends('administrator.__layouts.basic')

@section('title')
	<title>Administrator Area - {{ title_case(str_replace('-', ' ', $index)) }}</title>
@endsection

@section('css')
	<link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
	<style type="text/css">
		.content{
			margin: 0px auto;
			padding: 10px;
			max-width: 300px;
			max-height: 180px;
			overflow-y: auto;
		}
		table img{
			max-height: 120px;
			max-width: 120px;
		}
	</style>
	<script src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>{{ title_case(str_replace('-', ' ', $index)) }} <small>list</small></h2>
					<div class="nav navbar-right panel_toolbox">
			            <div class="btn-group">
			              <a 
			              	data-toggle='modal' 
			              	data-target='.modal-add'
			                data-href="{{ route('adm.mid.content.form', ['index'=>$index]) }}" 
			                class="open btn btn-success btn-sm"
			              >
			                <i class="fa fa-plus"></i> Add {{ title_case(str_replace('-', ' ', $index)) }}
			              </a>
			            </div>
				        <div class="btn-group">
			              <button type="button" class="btn btn-sm btn-success">
			                Administrator {{ $request->administrator != '' ? ' : '.$request->administrator : ' : All'}}
			              </button>
			              <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
			                <span class="caret" style="color:white;"></span>
			              </button>
			              <ul class="dropdown-menu" role="menu">
			                <li>
			                  <a href="{{ route('adm.mid.content', ['index'=>$index, 'administrator'=>'', 'status'=>$request->status]) }}">
			                    Show All
			                  </a>
			                </li>
			                @php $lastAuthor = 0 @endphp
			                @foreach($adm as $data)
			                @if($lastAuthor != $data->id)
			                <li>
			                  <a href="{{ route('adm.mid.content', ['index'=>$index, 'administrator'=>$data->email, 'status'=>$request->status]) }}">
			                    {{ $data->name }}
			                  </a>
			                </li>
			                @endif
			                @php $lastAuthor = $data->id @endphp
			                @endforeach
			              </ul>
			            </div>
			            <div class="btn-group">
			              <button type="button" class="btn btn-sm btn-success">
			                Status {{ $request->status != '' ? ' : '.title_case($request->status) : ' : All'}}
			              </button>
			              <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
			                <span class="caret" style="color:white;"></span>
			              </button>
			              <ul class="dropdown-menu" role="menu">
			                <li>
			                  <a href="{{ route('adm.mid.content', ['index'=>$index, 'administrator'=>$request->administrator, 'status'=>'']) }}">
			                    Show All
			                  </a>
			                </li>
			                <li>
			                  <a href="{{ route('adm.mid.content', ['index'=>$index, 'administrator'=>$request->administrator, 'status'=>'active']) }}">
			                    Active
			                  </a>
			                </li>
			                <li>
			                  <a href="{{ route('adm.mid.content', ['index'=>$index, 'administrator'=>$request->administrator, 'status'=>'deactive']) }}">
			                    Deactive
			                  </a>
			                </li>
			              </ul>
			            </div>
			            <div class="btn-group">
			              <a 
			                class="btn btn-success btn-sm"
			                href="{{ route('adm.mid.content', ['index'=>$index]) }}" 
			              >
			                <i class="fa fa-refresh"></i> Clear Filter
			              </a>
			            </div>
			            <div class="btn-group">
			              <button type="button" class="btn btn-sm btn-success">
			                <i class="fa fa-cog"></i> Tools
			              </button>
			              <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
			                <span class="caret" style="color:white;"></span>
			              </button>
			              <ul class="dropdown-menu" role="menu">
			                <li>
			                  <a class="tools select-all" href="#">
			                    <i class="fa fa-check-square-o"></i> Select All
			                  </a>
			                </li>
			                <li>
			                  <a class="tools unselect-all" href="#">
			                    <i class="fa fa-square-o"></i> Unselect All
			                  </a>
			                </li>
			                <li>
			                  <a class="tools action activate" data-href="{{ route('adm.mid.content.action', ['index'=>$index, 'action'=>'activate'] ) }}" data-toggle='modal' data-target='.modal-aksi'>
			                    <i class="fa fa-check"></i> Activate
			                  </a>
			                </li>
			                <li>
			                  <a class="tools action deactivate" data-href="{{ route('adm.mid.content.action', ['index'=>$index, 'action'=>'deactivate']) }}" data-toggle='modal' data-target='.modal-aksi'>
			                    <i class="fa fa-ban"></i> Deactivate
			                  </a>
			                </li>
			                <li>
			                  <a class="tools action delete" data-href="{{ route('adm.mid.content.action', ['index'=>$index, 'action'=>'delete']) }}" data-toggle='modal' data-target='.modal-aksi'>
			                    <i class="fa fa-trash-o"></i> Delete
			                  </a>
			                </li>
			              </ul>
			            </div>
			        </div>
                    <div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="table-responsive">
						<table id="table-data" class="table table-striped table-bordered no-footer" width="100%">
							<thead>
								<tr role="row">
									<th>Created At</th>
									<th>Created By</th>
									<th>Status</th>
									<th>Data</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade modal-aksi" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button 
						type="button" 
						class="close" 
						data-dismiss="modal" 
						aria-label="Close"
					>
						<span aria-hidden="true">×</span>
					</button>
					<h4 id="title-aksi" class="modal-title"></h4>
				</div>
				<div id="text-aksi" class="modal-body">
				</div>
				<div class="modal-footer">
					<div id="action_respone" class="alert alert-info alert-dismissible fade in" role="alert"></div>
					<a class="btn btn-primary" id="aksi-url">Yes</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade modal-add" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				
			</div>
		</div>
	</div>
@endsection


@section('js')
	<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>

	<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>

    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>

	<script type="text/javascript">
		var url = '{!! route('adm.mid.content.data', ['index'=>$index, 'administrator'=>$request->administrator, 'status'=>$request->status]) !!}';

		var datatables = $('#table-data').DataTable({
			dom: 'Bfrtip',
		    lengthMenu: [
		        [ 10, 25, 50, 100, 250 ],
		        [ '10 rows', '25 rows', '50 rows', '100 rows', '250 rows' ]
		    ],
		    buttons: {
		      buttons: [
		        'pageLength'//, 'copy', 'print'
		      ]
		    },
	        processing: true,
	        serverSide: true,
	        ajax: url,
	        aaSorting: [ [0,'desc'] ],
	        columns: [
	          {data: 'created_at'},
	          {data: 'administrator_id'},
	          {data: 'flag'},
	          {data: 'name'},
	          {data: 'action', orderable: false, searchable: false}
	        ],
	        initComplete: function () {
	            this.api().columns().every(function () {
	                var column = this;
	                var input = document.createElement("input");
	                $(input).appendTo($(column.footer()).empty())
	                .on('change', function () {
	                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

	                    column.search(val ? val : '', true, false).draw();
	                });
	            });
	        }
		});
	</script>

	<script type="text/javascript">
		$(function(){
			$(document).on('click', '.open.btn, ul li a.open', function(){
		        var url   = $(this).data('href');
		        $.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            }
		        });
		        $.ajax({
		            url: url,
		            type: 'get',
		            dataType: 'json',
		            beforeSend: function() {
		              
		            },
		            success: function(data) {
		              $('div.modal-add div.modal-content').html(data.html);
		              window.setTimeout(function() {
		                CKEDITOR.replace('content');
		              }, 250);
		            }
		        })
		        return false;
			});

			$(document).on('submit', 'form#add', function(){
		        var url   = $(this).attr('action');
		        // var data  = $(this).serializeArray(); // digunakan jika hanya mengirim form tanpa file
		        var data  = new FormData($(this)[0]); // digunakan untuk mengirim form dengan file
		        // console.log(data);
		        
		        $.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            }
		        });
		        $.ajax({
		            url: url,
		            type: 'post',
		            dataType: 'json',
		            data: data,
		            processData:false, // untuk menggunakan new FormData wajib menggunakan ini dengan value false
		            contentType:false, // untuk menggunakan new FormData wajib menggunakan ini dengan value false
		            beforeSend: function() {
		              $('form #add_respone').show().html('Please Wait...! Please Wait...! Please Wait...!');
		              $('form p.error').hide().html('');
		            },
		            success: function(data) {
		              $('form #add_respone').html(data.msg);
		              if (data.response == true) {
			            $('form p.error').hide().html('');
		                datatables.ajax.reload();
		                window.setTimeout(function() {
		                  $('form #add_respone').hide().html('');
		                  $('div.modal.modal-add').modal('hide');
		                }, 1750);
		              }
		              else{
		                $.each(data.resault, function(key, val){
		                	$('form p.'+key+'.error').show().html(val);
		                });
		              }
		            }
		        })
		        return false;
			});
	    });	
	</script>

	<script type="text/javascript">
		$('#action_respone').hide();

		$('#table-data').on('click', 'a.delete', function(){
			var a = $(this).data('href');
			$('#aksi-url').attr('href', a);
			$('#title-aksi').html("{{ title_case(str_replace('-', ' ', $index)) }} Delete");
			$('#text-aksi').html("<h5>Are You Sure? To Delete This {{ title_case(str_replace('-', ' ', $index)) }}?</h5>");
		});
		$('#table-data').on('click', 'a.deactivate', function(){
			var a = $(this).data('href');
			$('#aksi-url').attr('href', a);
			$('#title-aksi').html("{{ title_case(str_replace('-', ' ', $index)) }} Deactivate");
			$('#text-aksi').html("<h5>Are You Sure? To Deactivate This {{ title_case(str_replace('-', ' ', $index)) }}?</h5>");
		});
		$('#table-data').on('click', 'a.activate', function(){
			var a = $(this).data('href');
			$('#aksi-url').attr('href', a);
			$('#title-aksi').html("{{ title_case(str_replace('-', ' ', $index)) }} Activate");
			$('#text-aksi').html("<h5>Are You Sure? To Activate This {{ title_case(str_replace('-', ' ', $index)) }}?</h5>");
		});

		$('div.modal-aksi').on('click', 'a#aksi-url', function(){
	        var url   = $(this).attr('href');
	        $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
	        $.ajax({
	            url: url,
	            type: 'get',
	            dataType: 'json',
	            beforeSend: function() {
	              $('#action_respone').show().html('Please Wait...! Please Wait...!');
	            },
	            success: function(data) {
	              $('#action_respone').html(data.msg);
	              datatables.ajax.reload();
	              window.setTimeout(function() {
	                $('#action_respone').hide().html('');
	                $('div.modal.modal-aksi').modal('hide');
	              }, 1750);
	            }
	        });
	        return false;
		});

		$('#table-data').on('click', 'button.choice', function(){
			$(this).toggleClass('btn-success');
			if ($(this).hasClass('btn-success')) {
				$(this).children().removeClass('fa-square-o').addClass('fa-check-square-o');
			}
			else{
				$(this).children().removeClass('fa-check-square-o').addClass('fa-square-o');
			}
		});

		$(document).on('click', 'a.tools', function(){
			if ($(this).hasClass('select-all')) {
				$('#table-data button.choice').addClass('btn-success').children().removeClass('fa-square-o').addClass('fa-check-square-o');
			}
			else if($(this).hasClass('unselect-all')) {
				$('#table-data button.choice').removeClass('btn-success').children().removeClass('fa-check-square-o').addClass('fa-square-o');
			}
			else if($(this).hasClass('action')) {
				var a = $(this).data('href');
				var b = '';
				$('#table-data button.choice.btn-success').each(function(){
					b += $(this).data('id')+'^';
				});
				if (b == '') {
					$('#aksi-url').attr('href', '#').hide();
					$('#title-aksi').html("<strong>Sorry!</strong> Please Select...!");
					$('#text-aksi').html("<strong>Sorry!</strong> Please Select...!<strong> Sorry!</strong> Please Select...!");
				}
				else{
					$('#aksi-url').attr('href', a+'&id='+b).show();
					if ($(this).hasClass('activate')) {
						$('#title-aksi').html("{{ title_case(str_replace('-', ' ', $index)) }} Activate");
						$('#text-aksi').html("<h5>Are You Sure? To Activate This {{ title_case(str_replace('-', ' ', $index)) }}?</h5>");
					}
					else if ($(this).hasClass('deactivate')) {
						$('#title-aksi').html("{{ title_case(str_replace('-', ' ', $index)) }} Deactivate");
						$('#text-aksi').html("<h5>Are You Sure? To Deactivate This {{ title_case(str_replace('-', ' ', $index)) }}?</h5>");
					}
					else if ($(this).hasClass('delete')) {
						$('#title-aksi').html("{{ title_case(str_replace('-', ' ', $index)) }} Delete");
						$('#text-aksi').html("<h5>Are You Sure? To Delete This {{ title_case(str_replace('-', ' ', $index)) }}?</h5>");
					}
				}
				return false;
			}
		});
	</script>
@endsection
