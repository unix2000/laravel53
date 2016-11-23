<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests;

class VueController extends Controller
{
	public function index(){
		return view('vue.index')->withMessage('===laravel vue===');
		//return view('vue.index',compact('message','laravel vue'));
		//return view('vue.index')->with('message','laravel vue');
	}
}
