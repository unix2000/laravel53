<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

// use App\Http\Requests;

class ResController extends Controller
{
    public function index(){
    	//cookie 
    	//这样设置cookie相比其他框架有点不太习惯
		// Cookie::make('username', 'liner.xie', '10');
		// return response('hello')
  //           ->header('Content-Type', 'text/html')
  //           ->cookie('username', 'liner', 10);
    	// return response('中文信息')
    	// 	->header('Content-Type', 'text/html')
    	// 	->cookie('users','liner.xie',10);
    	// dump(Cookie::get('username'));
    	// dump(Cookie::get('users'));

    	//session
    	// dump(Session::all());
    }
}
