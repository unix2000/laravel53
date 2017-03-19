<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\json_encode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//闭包无法缓存路由 php artisan route:cache
Route::resource('post','PostController');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@welcome');
//request
Route::get('/get',function(Request $req){
	dump($req->isMethod('get'));
	$data = \App\Items::limit(10)->get();
	echo json_encode([
		'data' => $data,
		'msg' => 'success',
		'code' => '101',
	]);
});

Route::get('command', function () {	
	/* php artisan serve */
    \Artisan::call('serve');
    dd("Done");
});
//micro restful
Route::post('/api/post',function (Request $req){
    echo 'this is a restful post';
});
Route::put('/api/put',function(Request $req){
    echo 'this is a restful put';
    //client post json
    // $data = $req->getContent();
});
Route::patch('/api/patch',function(){
	echo 'this is a restful patch call';
});
Route::delete('/api/delete',function(){
	echo 'this is a restful delete call';
});

Route::get('/req','ReqController@index');
//response
// Route::get('/res',function(Response $res){
// 	echo 'this is a response';
// 	dump($res);
// });

Route::get('/res','ResController@index');
//Route::get('/db.html','DBController@index');
Route::get('/db','DbController@index');
Route::get('/db/test','DbController@test');
Route::get('/db/zui','DbController@zui');
Route::get('/db/fractal','DbController@fractal');
Route::get('/redis','RedisController@index');
Route::get('/mongo','MongoController@index');
Route::get('/form','FormController@index');
Route::post('/form', 'FormController@store');
Route::get('/form/valid','FormController@valid');
Route::post('validForm', 'FormController@validForm');
Route::get('/form/validator','FormController@validator');
Route::post('/form/validatorForm','FormController@validatorForm');
Route::get('/form/autocomplete','FormController@autocomplete');
Route::get('/form/dataAjax','FormController@dataAjax');
Route::get('/test','TestController@index');
Route::get('/test/de-token','TestController@detoken');
Route::get('/di','DiController@index');
Route::get('/session','SessionController@index');
Route::get('/ui','UiController@index');
Route::get('/ui/uikit','UiController@uikit');
Route::get('/ui/dtgrid','UiController@dtGrid');
Route::any('/ui/get-datas','UiController@getDatas');
Route::get('/ui/ztree','UiController@ztree');
Route::get('/ui/fancytree','UiController@fancytree');
Route::get('/ui/semantic','UiController@semantic');
Route::get('/ui/login','UiController@login');
Route::get('/ui/tests','UiController@tests');
Route::get('/ui/card','UiController@card');
Route::get('/ui/s','UiController@s');
Route::get('/ui/dashboard','UiController@dashboard');
Route::get('/ui/ajax','UiController@ajax');
Route::get('/ui/bao','UiController@bao');
Route::get('/ui/v3','UiController@V3');
Route::get('/ui/v4','UiController@V4');
Route::get('/v4/template','UiController@template');
Route::get('/ajax-load-more','UiController@ajaxLoadMore');
Route::get('/repo','RepositoryController@index');
Route::get('/bui','BuiController@index');
Route::get('/bui/grid','BuiController@grid');
Route::any('/bui/gridJson','BuiController@gridJson');
Route::get('/bui/bx','BuiController@bao');
Route::get('/bui/tab','BuiController@tab');
Route::get('/bui/tree','BuiController@tree');
Route::get('/bui/tree-select','BuiController@treeSelect');
Route::get('/bui/tree-select2','BuiController@treeSelect2');
Route::get('/bui/many','BuiController@many');
Route::get('/bui/remote','BuiController@remote');
Route::get('/bui/remote-get','BuiController@remoteGet');
Route::get('/easyui/grid','EasyController@grid');
Route::get('/easyui/data','EasyController@generateData');
Route::get('/easyui/tree','EasyController@tree');
Route::get('/easyui/treeJson','EasyController@treeJson');
Route::get('/easyui/tab','EasyController@tab');
Route::get('/easyui/welcome','EasyController@welcome');
Route::get('/easyui/panel','EasyController@panel');
Route::get('/easyui/accordion','EasyController@accordion');
Route::get('/easyui/bx','EasyController@bao');
Route::get('/easyui/bao-a','EasyController@baoA');
Route::get('/easyui/loader','EasyController@loader');
//中间件测试
Route::any('one',['uses' => 'MiddleController@one']);
Route::group(['middleware' =>['TestMiddle']],function(){
    Route::any('two',['uses' => 'MiddleController@two']);
    Route::any('three',['uses' => 'MiddleController@three']);
});

//后台管理
Route::group(
	[ 
		'middleware' => ['web'],
		'namespace'  => 'Sys',
		'prefix' => 'sys'
	], function () {
	Route::get('/dept', [
		'as'   => 'dept.index',
		'uses' => 'DeptController@index',
	]);
	Route::post('/dept', [
		'as'   => 'dept.store',
		'uses' => 'DeptController@store',
	]);
	Route::get('/dept/{id}', [
		'as'   => 'dept.show',
		'uses' => 'DeptController@show',
	]);
	Route::get('/dict', [
		'as'   => 'dict',
		'uses' => 'DictController@index',
	]);
});

//人力资源
Route::group(
	[ 
		'middleware' => ['web'],
		'namespace'  => 'Human',
		'prefix' => 'hr'
	], function () {
	Route::get('/employee', [
		'as'   => 'employee',
		'uses' => 'EmployeeController@index',
	]);
});
Route::get('/loader','EasyController@loader');

//paypal
Route::get('addmoney/paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('addmoney/paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('addmoney/paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));

//gearman
Route::get('/gearman/client','GearmanController@client');

Auth::routes();

Route::get('/home', 'HomeController@index');
//vue
Route::get('/vue', 'VueController@index');
Route::get('/vue/ajax', 'VueController@ajax');
Route::get('vue/api', 'VueController@getData');
Route::resource('resource','ResourceController');
Route::group(['domain' => '{account}.laravel53.dev'],function(){
	// echo 'domain route';
    Route::get('/', function($account, $id) {
        echo 'domain route';
        // return Redirect::to('http://laravel53.dev/'.$account);
    });
});