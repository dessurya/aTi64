<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;
use App\Models\Partner;
use App\Models\News;
use App\Models\Inbox;

use App\Models\Industry;
use App\Models\Category;
use App\Models\Product;

use Validator;
use DB;
use Mail;

use Illuminate\Support\Facades\Route;

class FrontController extends Controller
{
	public static function getNewsNav(){
		$html = "";
		$routename = Route::currentRouteName();
		if (News::where('flag', 'Y')->count() >= 1) {
			$class = '';
			if($routename == 'news' or $routename == 'newsdetail'){ $class = 'active'; }
			$html .= '<div class="col">';
			$html .= '<a class="'.$class.'" href="'.route('news').'">';
			$html .= 'News';
			$html .= '</a>';
			$html .= '</div>';
		}
		return $html;			
	}

	public function home(){
		$banner = Banner::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(5)->get();
		$industry = Industry::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(5)->get();
		$partner = Partner::where('flag', 'Y')->inRandomOrder()->limit(15)->get();
		$news = News::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(3)->get();

		return view('front.home.index', compact(
			'banner',
			'industry',
			'partner',
			'news'
		));
	}

	public function aboutus(){
		$industry = Industry::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(5)->get();
		$news = News::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(3)->get();

		return view('front.aboutus.index', compact(
			'industry',
			'news'
		));
	}

	public function service(){
		$industry = Industry::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(5)->get();
		$news = News::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(3)->get();

		return view('front.service.index', compact(
			'industry',
			'news'
		));
	}

	public function partners(){
		$partner = Partner::where('flag', 'Y')->orderBy('created_at', 'desc')->get();
		$news = News::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(3)->get();

		return view('front.partners.index', compact(
			'partner',
			'news'
		));
	}


	public function news(){
		$news = News::where('flag', 'Y')->orderBy('created_at', 'desc')->paginate(6);
		return view('front.news.index', compact(
			'news'
		));
	}
	public function newsdetail($slug){
		$detail = News::where('slug', $slug)->first();
		$news = News::where('flag', 'Y')->orderBy('created_at', 'desc')->paginate(6);

		return view('front.news.detail', compact(
			'detail',
			'news'
		));
	}
	public function newslistadd(request $request){
		$news 	= News::orderBy('created_at','desc')->where('flag', 'Y')->paginate(6);
		$view = view('front._layout._include-news-list',compact('news'))->render();
		return response()->json(['html'=>$view]);
	}

	public function contactus(){
		return view('front.contactus.index');
	}

	public function industry(){
		$industry = Industry::where('flag', 'Y')->orderBy('created_at', 'desc')->get();
		$news = News::where('flag', 'Y')->orderBy('created_at', 'desc')->limit(3)->get();

		return view('front.product.industry', compact(
			'industry',
			'news'
		));
	}

	public function category($slug){
		$industry = Industry::where('slug', $slug)->first();
		return view('front.product.category', compact(
			'industry'
		));
	}

	public function product($slug, $subslug){
		$category = Category::where('slug', $subslug)->first();
		return view('front.product.product', compact(
			'category'
		));
	}

	public function productaddlist($slug, $subslug, request $request){
		$category = Category::where('slug', $subslug)->first();
		$product = Product::where('product_category_id', $category->id)->orderBy('name', 'asc')->where('flag', 'Y')->paginate(6);

		$view = '';
		foreach($product as $list){
			$view .= view('front._layout._include-products-list',compact('list'))->render();
		}
		return response()->json(['html'=>$view]);
	}

	public function pdcdwnld(){
		$industry = Industry::orderBy('name', 'asc')->get();
		return view('front.product.print', compact(
			'industry'
		));	
	}

	public function message(request $request){
        $message = [];
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:75',
			'handphone' => 'nullable|min:8|max:25',
			'email' => 'required|email',
			'subject' => 'required',
			'message' => 'required|min:10',
			// 'g-recaptcha-response' => 'required',
		], $message);

		if($validator->fails()){
			return response()->json([
				'response'=>false,
	        	'resault'=>$validator->getMessageBag()->toArray(),
	        	'msg'=>'<h3>Some Thing Wrong...!</h3>'
	        ]);
		}

		DB::transaction(function () use($request) {
			$save = new Inbox;
			$save->name		= $request->name;
			$save->email	= $request->email;
			$save->handphone= $request->handphone;
			$save->subject	= $request->subject;
			$save->message	= $request->message;
			$save->save();

			$data = array([
	            'name' => $request->name,
	            'email' => $request->email,
	            'phone' => $request->handphone,
	            'subject' => $request->subject,
	            'message' => $request->message,
	        ]);

	        // Mail::send('mail.new-inbox', ['data' => $data], function($message) use ($data) {
	        //     $message->from('robot@a3.co.id', 'Robot Administrator')
	        //         ->to('fourline66@gmail.com', 'adam surya')
	        //         ->subject('New Inbox');
	        // });
		});

		return response()->json([
			'response'=>true,
        	'msg'=>'<h3>Success</h3>'
        ]);
    }
}
