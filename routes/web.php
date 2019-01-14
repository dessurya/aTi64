<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@home')
	->name('home');
Route::get('/about-us', 'FrontController@aboutus')
	->name('aboutus');
Route::get('/partners', 'FrontController@partners')
	->name('partners');
Route::get('/service', 'FrontController@service')
	->name('service');

Route::get('/news/list/add', 'FrontController@newslistadd')
	->name('newslistadd');
Route::get('/news', 'FrontController@news')
	->name('news');
Route::get('/news/{slug}', 'FrontController@newsdetail')
	->name('newsdetail');

Route::get('/products', 'FrontController@industry')
	->name('industry');
Route::get('/products/{slug}', 'FrontController@category')
	->name('category');
	
Route::get('/products/{slug}/{subslug}/list/add', 'FrontController@productaddlist')
	->name('productaddlist');
Route::get('/products/{slug}/{subslug}', 'FrontController@product')
	->name('product');

Route::get('/product-download', 'FrontController@pdcdwnld')
	->name('pdcdwnld');
	

Route::get('/contact-us', 'FrontController@contactus')
	->name('contactus');


Route::post('/sand-message', 'FrontController@message')
	->name('message');

Route::prefix('administrator')->group(function(){

	// new user default
		Route::get('adduser', function(){
			$confirmation_code = str_random(30).time();
			$user = new App\Models\Administrator;
			$user->name = 'Budiman';
			$user->email = 'budbud@gmail.com';
			$user->confirmed = 'N';
			$user->login_count = 0;
			$user->password = Hash::make('asdasd');
			$user->confirmation_code = $confirmation_code;
			$user->save();
			dd('succes');
			return redirect()
				->route('adm.auth.login.from')
				->with('notif', 'success to add adam');
		});

		Route::get('addlogs', function(){
			for($a=0; $a<=4; $a++){
				$logs = new App\Models\AdministratorLogs;
				$logs->administrator_id = 2;
				$logs->logs = 'El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson';
				$logs->save();
			}
			dd('succes');
		});

		Route::get('addinbox', function(){
			for($a=0; $a<=4; $a++){
				$inbox = new App\Models\Inbox;
				$inbox->name = 'bubud';
				$inbox->email = 'budbud@gmail.com';
				$inbox->message = 'percobaan input data';
				$inbox->save();
			}
			dd('succes');
		});		
	// new user default

	// auth
		Route::get('login', 'Administrator\Auth\LoginController@loginForm')
			->name('adm.auth.login.from');
		Route::post('login/action', 'Administrator\Auth\LoginController@loginAction')
			->name('adm.auth.login.action');
	// auth

	// Middleware Auth
		Route::middleware('administrator')->group(function(){

			Route::post('logout', 'Administrator\Auth\LoginController@logout')
				->name('adm.auth.logout.action');

			Route::get('dashborad', 'Administrator\DashboardController@index')
				->name('adm.mid.dashboard');

			Route::prefix('account')->group(function(){
				Route::get('me', 'Administrator\AccountController@profile')
					->name('adm.mid.account.me');
				Route::get('me/logs', 'Administrator\AccountController@meLogs')
					->name('adm.mid.account.me.logs');
				Route::post('me/update', 'Administrator\AccountController@profileUpdate')
					->name('adm.mid.account.me.update');

				Route::post('add', 'Administrator\AccountController@add')
					->name('adm.mid.account.add');
					
				Route::get('list', 'Administrator\AccountController@list')
					->name('adm.mid.account.list');
				Route::get('list/data', 'Administrator\AccountController@listData')
					->name('adm.mid.account.list.data');
				Route::get('list/data/{action}', 'Administrator\AccountController@listDataAction')
					->name('adm.mid.account.list.data.action');

				Route::get('logs', 'Administrator\AccountController@logs')
					->name('adm.mid.account.logs');
				Route::get('logs/list', 'Administrator\AccountController@logsList')
					->name('adm.mid.account.logs.list');
			});

			Route::prefix('products')->group(function(){
				Route::get('industry-data', 'Administrator\ProductsController@getIndustry')
					->name('adm.mid.product.industry.data');
				Route::get('category-data', 'Administrator\ProductsController@getCategory')
					->name('adm.mid.product.category.data');

				Route::get('{index}', 'Administrator\ProductsController@index')
					->name('adm.mid.product.list');

				Route::get('{index}/data', 'Administrator\ProductsController@indexData')
					->name('adm.mid.product.list.data');

				Route::get('{index}/form', 'Administrator\ProductsController@openForm')
					->name('adm.mid.product.list.form');
				Route::post('{index}/form', 'Administrator\ProductsController@openFormStore')
					->name('adm.mid.product.list.form.store');

				Route::get('{index}/action', 'Administrator\ProductsController@indexAction')
					->name('adm.mid.product.list.action');
			});

			Route::get('inbox', 'Administrator\InboxController@index')
				->name('adm.mid.inbox');
			Route::get('inbox/data', 'Administrator\InboxController@data')
				->name('adm.mid.inbox.data');

			Route::prefix('content')->group(function(){
				Route::get('{index}', 'Administrator\ContentController@index')
					->name('adm.mid.content');
				Route::get('{index}/data', 'Administrator\ContentController@data')
					->name('adm.mid.content.data');

				Route::get('{index}/form', 'Administrator\ContentController@openForm')
					->name('adm.mid.content.form');
				Route::post('{index}/form', 'Administrator\ContentController@openFormStore')
					->name('adm.mid.content.form.store');

				Route::get('{index}/action', 'Administrator\ContentController@action')
					->name('adm.mid.content.action');
			});

		});
	// Middleware Auth
});