<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Input
use Illuminate\Support\Facades\Input;
class ReqController extends Controller
{
	public function index(Request $req){
// 		dump($req);
        dump($this->request);
        // dump($this->container);
		//dump($req->getBaseUrl());
		//dump($req->getScheme());
		//dump($req->getPort());
		//dump($req->getHttpHost());
		//echo $req->isXmlHttpRequest() ? 'ajax request': 'not ajax request';
//		echo $req->isMethod('GET') ? 'get' : 'not get';
//		echo $req->method() == 'GET' ? 'get' : 'not get';

		//form
		//$req->has('form.username');
		//dump($req->all());
//         dump(Input::all());
        // dump(Input::json());
	}
}
