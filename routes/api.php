<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


// Route::resource('items', 'ItemsAPIController');

//dingo api router
$api = app('Dingo\Api\Routing\Router');
// $api->version(['v1', 'v2'], function ($api) {
// 	$api->get('users/{id}', 'App\Api\Controllers\UserController@show');
// });

//对应.env API_VERSION=v1
// $api->version('v1', ['middleware' => 'api.auth'],function ($api) {
$api->version('v1', function ($api) {
    $api->get('users/{id}', 'App\Api\Controllers\UserController@show');
    $api->post('auth/register', 'App\Api\Controllers\AuthController@register');
    // 用户登录验证并返回 Token
    $api->post('auth/token', 'App\Api\Controllers\AuthController@token');
    // 获取用户手机验证码
    $api->get('auth/getRandKey', 'App\Api\Controllers\AuthController@getRandKey');
    // 重置用户密码，并发送随机密码到短信
    $api->get('auth/getRandPassword', 'App\Api\Controllers\AuthController@getRandPassword');
});

// 私有接口
$api->version('v1', ['protected' => true], function ($api) {
    // 更新用户 token
    $api->get('upToken', 'App\Api\Controllers\AuthController@upToken');
    // 获取当前用户信息
    $api->get('me', 'App\Api\Controllers\UserController@me');
    // 修改当前用户信息
    $api->post('me', 'App\Api\Controllers\UserController@up');
});
//另外一种目录方式
// $api->version('v1', function ($api) {
//     $api->get('users/{id}', 'App\Api\V1\Controllers\UserController@show');
// });

// $api->version('v2', function ($api) {
//     $api->get('users/{id}', 'App\Api\V2\Controllers\UserController@show');
// });

Route::post('phone/code', 'ApiController@sendVerifyCode');