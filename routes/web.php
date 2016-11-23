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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
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
Route::get('/test','TestController@index');
Route::get('/test/de-token','TestController@detoken');
Route::get('/di','DiController@index');
Route::get('/session','SessionController@index');
Route::get('/ui','UiController@index');
Route::get('/repo','RepositoryController@index');

//中间件测试
Route::any('one',['uses' => 'MiddleController@one']);
Route::group(['middleware' =>['TestMiddle']],function(){
    Route::any('two',['uses' => 'MiddleController@two']);
    Route::any('three',['uses' => 'MiddleController@three']);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/vue', 'VueController@index');
Route::resource('resource','ResourceController');
Route::group(['domain' => '{account}.laravel53.dev'],function(){
	// echo 'domain route';
    Route::get('/', function($account, $id) {
        echo 'domain route';
        // return Redirect::to('http://laravel53.dev/'.$account);
    });
});