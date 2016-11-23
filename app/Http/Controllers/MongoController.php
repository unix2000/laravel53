<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mongo;
use DB;
// use App\Http\Requests;

class MongoController extends Controller
{
    //jenssegers/mongodb
    public function index(){
        //命令行
        //show dbs; show collections;db.customer.find().limit(10);
    	
        //orm type
    	// $model = new Mongo();
    	// dump($model);
    	// dump(Mongo::all());
    	// dump(Mongo::first());
    	// $data = Mongo::first();
    	// echo $data->email;

    	//db方式
    	// $data = DB::connection('mongodb')->table('customer')->get();
    	//collection
    	$data = DB::connection('mongodb')->collection('customer')->get();
    	// foreach ($data as $k => $v) {
    	// 	echo $v['_id'] . '<br />';
    	// }
    	// echo $data->email;
    	dump($data->toArray());
        // dump($data->toJson());
    }
}
