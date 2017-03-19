<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Models\Items;

class VueController extends Controller
{
	public function index(){
		return view('vue.index')->withMessage('===laravel vue===');
		//return view('vue.index',compact('message','laravel vue'));
		//return view('vue.index')->with('message','laravel vue');
	}
	public function ajax()
	{
		return view('vue.ajax');	
	}
	public function getData()
	{
		$model = Items::searchPaginateAndOrder();
        $columns = Items::$columns;
        return response()
			->json([
                'model' => $model,
                'columns' => $columns
			]);
	}
}
