<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DiController extends Controller
{
//     public function __construct(Request $req, Response $res){
//         parent::__construct($req, $res);
//     }
    public function index(){
    	// dump(Auth::user());
    	// dump(Auth::guest());
    	// attempt true or false
    	// dump(Auth::attempt(['email' => 'liner.xie@qq.com', 'password' => '123456']));
    	// dump(Auth::user()->name);
    	// dump(Auth::guard());
// 		dump(app());
//         dump($this->request->isMethod('get'));
//         dump($this->response);
//         dump(app()->request);
//         dump(app('request'));
//         response不能这么调用
//         dump(app()->response);

//         dump(app()->session);
//         dump(app()->cookie);
//         dump(app()->db);
//         dump(app()->flash);
        dump(app()->redis);
//         dump(app()->basePath());
//         dump(app()->config->get('admin.upload'));
//         dump(app()->config->get('app'));
//         dump(app()->app);
    }
}
