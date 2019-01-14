<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Inbox;
use DataTables;

class InboxController extends Controller
{
	public function index(){
		return view('administrator.inbox.index');
	}

	public function data(request $request){
		$data = Inbox::select('*')->orderBy('created_at', 'desc')->get();

		return $Datatables = Datatables::of($data)->editColumn('message', function ($data){
				$html = '<div class="content">'.$data->message.'</div>';
	    		return $html;
			})->escapeColumns(['*'])->make();
	}
}
