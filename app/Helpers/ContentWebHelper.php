<?php
namespace App\Helpers;

use Validator;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ContentWebHelper {

	public static function store($index, $request){
		$message = [];
		if (isset($request->slug)) {
			$Model = "App\Models\\".studly_case($index);
			$save = $Model::where('slug', $request->slug)->first();
			if (!$save) {
				return response()->json([
					'response'=>false,
		         	'resault'=>null,
		         	'msg'=>'Sorry! Some Thing Wrong...!'
	         	]);
			}
			$id = $save->id;
		}
		else if (isset($request->id)) {
			$Model = "App\Models\\".studly_case($index);
			$save = $Model::find($request->id);
			if (!$save) {
				return response()->json([
					'response'=>false,
		         	'resault'=>null,
		         	'msg'=>'Sorry! Some Thing Wrong...!'
	         	]);
			}
			$id = $save->id;
		}

		if ($index == 'banner') {
			if (isset($id)) {
				$validator = Validator::make($request->all(), [
					'name' => 'required|max:175',
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
				], $message);
			}
			else {
				$validator = Validator::make($request->all(), [
					'name' => 'required|max:175',
					'picture' => 'required|image|mimes:jpeg,bmp,png|max:6500',
				], $message);
			}
		}
		else if ($index == 'news') {
			if (isset($id)) {
				$validator = Validator::make($request->all(), [
					'name' => 'required|max:175|unique:phat_news,name,'.$id,
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
					'content' => 'nullable',
				], $message);
			}
			else {
				$validator = Validator::make($request->all(), [
					'name' => 'required|max:175|unique:phat_news,name',
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
					'content' => 'nullable',
				], $message);
			}
		}
		else if ($index == 'partner') {
			if (isset($id)) {
				$validator = Validator::make($request->all(), [
					'name' => 'required|max:175|unique:phat_partner,name,'.$id,
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
					'web' => 'nullable',
				], $message);
			}
			else {
				$validator = Validator::make($request->all(), [
					'name' => 'required|max:175|unique:phat_partner,name',
					'picture' => 'required|image|mimes:jpeg,bmp,png|max:6500',
					'web' => 'nullable',
				], $message);
			}
		}
		else if ($index == 'industry') {
			if (isset($id)) {
				$validator = Validator::make($request->all(), [
					'name' => 'required|max:175|unique:phat_product_industry,name,'.$id,
					'content' => 'nullable',
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
				], $message);
			}
			else {
				$validator = Validator::make($request->all(), [
					'name' => 'required|max:175|unique:phat_product_industry,name',
					'content' => 'nullable',
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
				], $message);
			}
		}
		else if ($index == 'category') {
			if (isset($id)) {
				$validator = Validator::make($request->all(), [
					'industry' => 'required',
					'name' => 'required|max:175|unique:phat_product_category,name,'.$id,
					'content' => 'nullable',
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
				], $message);
			}
			else {
				$validator = Validator::make($request->all(), [
					'industry' => 'required',
					'name' => 'required|max:175|unique:phat_product_category,name',
					'content' => 'nullable',
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
				], $message);
			}	
		}
		else if ($index == 'product') {
			if (isset($id)) {
				$validator = Validator::make($request->all(), [
					'industry' => 'required',
					'category' => 'required',
					'name' => 'required|max:175|unique:phat_product,name,'.$id,
					'content' => 'nullable',
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
				], $message);
			}
			else {
				$validator = Validator::make($request->all(), [
					'industry' => 'required',
					'category' => 'required',
					'name' => 'required|max:175|unique:phat_product,name',
					'content' => 'nullable',
					'picture' => 'nullable|image|mimes:jpeg,bmp,png|max:6500',
				], $message);
			}	
		}
		else{
			return array(
				'response'=>false,
	         	'resault'=>'terjadi kesalahan dalam pengambilan data...!'
			);
		}

		if($validator->fails()){
			return array(
				'response'=>false,
	         	'resault'=>$validator->getMessageBag()->toArray()
			);
		}
		return array(
			'response'=>true
		);
	}
}