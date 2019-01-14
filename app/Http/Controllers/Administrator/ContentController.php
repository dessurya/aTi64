<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Administrator;

use Auth;
use DataTables;
use DB;
use Validator;
use Image;
use File;

use UserLogHelper;
use ContentWebHelper;

class ContentController extends Controller
{
	public function index($index, request $request){
		$indexList = array('banner', 'news', 'partner', 'project');
		if(!in_array($index, $indexList)){
			return redirect()->route('adm.mid.dashboard');
		}
		$adm = Administrator::orderBy('name', 'asc')->get();
		if ($request->administrator) {
			$getFilterAdministrator = Administrator::where('email',$request->administrator)->first();
			if (!$getFilterAdministrator) {
	    		return redirect()->route('adm.mid.product.list', ['index'=>$index])
					->with('notif', 'Sorry! Something Wrong!');
			}
		}

		return view('administrator.content.index', compact('index', 'request', 'adm'));
	}

	public function data($index, request $request){

		$Model = "App\Models\\".studly_case($index);
		$data = $Model::select('*');

		if ($request->administrator != null and isset($request->administrator)) {
			$getFilterAdministrator = Administrator::where('email',$request->administrator)->first();
    		$data = $data->where('administrator_id', $getFilterAdministrator->id);
		}
		if ($request->status != null and isset($request->status)){
			if ($request->status == 'active') {
	    		$data = $data->where('flag', 'Y');
			}
			else if ($request->status == 'deactive') {
	    		$data = $data->where('flag', 'N');
			}
		}
		$data = $data->orderBy('created_at', 'desc')->get();

		return $Datatables = Datatables::of($data)->editColumn('name', function($data) use ($index){
				$html = '';
				$html .= title_case($data->name);
				if ($index == 'partner' and isset($data->web) and $data->web != null) {
					$html .= ' <br><br><a href="http://'.$data->web.'" target="_blank">'.$data->web.'</a><br>';
				}
				if ($data->picture != null) {
					$html .= ' <br><a href="'.asset('asset/picture/'.$index.'/'.$data->picture).'" target="_blank"><img src="'.asset('asset/picture/'.$index.'/'.$data->picture).'"></a>';
				}
				return $html;
			})->editColumn('administrator_id', function($data){
				$html = '';
				if($data->getAdministrator == null){
	    			$html .= 'User Tidak Terdeteksi';
	    		}
	    		else{
					$html .= $data->getAdministrator->name.' <br>'.$data->getAdministrator->email;
				}
				return $html;
			})->editColumn('flag', function($data){
				$html = $data->flag == 'Y' ? 'Active' : 'Deactive' ;
				if ($data->content != null) {
					// $html .= ' <br><div class="content">'.$data->content.'</div>';
				}
				return $html;
			})->addColumn('action', function ($data) use ($index){
				$html = '';
				$html .= "<div class='btn-group'>";
				$html .= "<button type='button' class='btn btn-sm choice' data-id='".$data->id."'><i class='fa fa-square-o'></i></button>";
				$html .= "<button type='button' class='btn btn-sm btn-success'>";
				$html .= "<i class='fa fa-gears'></i> Tools";
				$html .= "</button>";
				$html .= "<button type='button' class='btn btn-sm btn-success dropdown-toggle' data-toggle='dropdown'>";
				$html .= "<span class='caret' style='color:white;'></span>";
				$html .= "</button>";
				$html .= "<ul class='dropdown-menu' role='menu'>";
				$html .= "<li><a class='open' data-href='".route('adm.mid.content.form', ['index'=>$index, 'id'=>$data->id])."' data-toggle='modal' data-target='.modal-add'><i class='fa fa-folder-open-o'></i> Open</a></li>";
				if($data->flag == 'Y'){
					$html .= "<li><a class='deactivate' data-href='".route('adm.mid.content.action', ['index'=>$index, 'action'=>'deactivate', 'id'=>$data->id])."' data-toggle='modal' data-target='.modal-aksi'><i class='fa fa-ban'></i> Deactivate</a></li>";
				}
				else{
					$html .= "<li><a class='activate' data-href='".route('adm.mid.content.action', ['index'=>$index, 'action'=>'activate', 'id'=>$data->id])."' data-toggle='modal' data-target='.modal-aksi'><i class='fa fa-check'></i> Activate</a></li>";
				}
				$html .= "<li><a class='delete' data-href='".route('adm.mid.content.action', ['index'=>$index, 'action'=>'delete', 'id'=>$data->id])."' data-toggle='modal' data-target='.modal-aksi'><i class='fa fa-trash-o'></i> Delete</a></li>";
				$html .= "</ul>";
				$html .= "</div>";

	    		return $html;
			})->escapeColumns(['*'])->make();
	}

	public function openForm($index, request $request){
		$data = null;

		if (isset($request->id)) {
			$Model = "App\Models\\".studly_case($index);
			$data = $Model::find($request->id);
			if (!$data) {
				return response()->json([
					'response'=>false,
					'html'=>'Sorry! Something Wrong!'
				]);
			}
		}

		$view = view('administrator.content._'.$index, compact('index','data'))->render();
		return response()->json(['response'=>true,'html'=>$view]);
	}

	public function openFormStore($index, request $request){

		$cek = ContentWebHelper::store($index, $request);

		if($cek['response'] == false){
			return response()->json([
				'response'=>false,
	         	'resault'=>$cek['resault'],
	         	'msg'=>'Sorry! Something Wrong...!'
			]);
		}

		$hasil = DB::transaction(function() use($index, $request){
			$Model = "App\Models\\".studly_case($index);
			$text = '';
			if ($request->id) {
				$save = $Model::find($request->id);
				if (!$save) {
					return response()->json([
						'response'=>false,
			         	'resault'=>null,
			         	'msg'=>'Sorry! Something Wrong...!'
		         	]);
				}
				$action = 'Update';
				$text .= $save->name.' to ';
			}
			else{
				$save = new $Model;
				$action = 'Add';
			}

			$columns=$save->getTableColumns(); // memanggil semua column/field pada table

			if ($request->name and in_array('name', $columns)) {
				$save->name = $request->name;
				if (in_array('slug', $columns)) {
					$save->slug = str_slug($request->name);
				}
			}

			if ($request->industry and in_array('product_industry_id', $columns)) {
				$save->product_industry_id = $request->industry;
			}

			if ($request->category and in_array('product_category_id', $columns)) {
				$save->product_category_id = $request->category;
			}

			if ($request->content and in_array('content', $columns)) {
				$save->content = $request->content;
			}

			if ($request->web and in_array('web', $columns)) {
				$save->web = $request->web;
			}

			if($request->file('picture') and in_array('picture', $columns)){
				
				$directory = 'asset/picture/'.$index;
				if ($save->picture != null) {
					File::delete($directory.'/'.$save->picture);
				}
				$salt = str_random(4);
				$image = $request->file('picture');
				$img_url = str_slug($request->name,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();

				$upload1 = Image::make($image)->encode('data-url');
				$upload1->save($directory.'/'.$img_url);
				$save->picture = $img_url;
			}
			

			if (in_array('administrator_id', $columns)) {
				$save->administrator_id = Auth::guard('administrator')->user()->id;
			}
			$save->save();

			$text .= $save->name;

			UserLogHelper::saved(title_case($index), $action, $text);

			return $save;
		});

		return response()->json([
			'response'=>true,
         	'msg'=>'Saved Data '.$hasil->name
		]);
	}

	public function action($index, request $request){
		$Model = "App\Models\\".studly_case($index);
		$getId = explode('^', $request->id);
		foreach ($getId as $id) {
			if ($id != null) {
				$get = $Model::find($id);

				if (!$get) {
					return response()->json([
						'response'=>false,
						'msg'=>'Sorry...! Something Wrong!'
					]);
				}

				if($request->action == 'deactivate' OR $request->action == 'activate'){
					$get->flag = $request->action == 'deactivate' ? 'N' : 'Y';
					$get->save();
				}
				else if($request->action == 'delete'){
					File::delete('asset/picture/'.$index.'/'.$get->picture);
					$get->delete();
				}

				UserLogHelper::saved(
					title_case(str_replace('-', ' ', $index)), 
					title_case(str_replace('-', ' ', $request->action)), 
					title_case($get->name)
				);
			}
		}
		return response()->json([
			'response'=>true,
			'msg'=>'<strong>Success!</strong> Execute Your Request!'
		]);
	}
}
