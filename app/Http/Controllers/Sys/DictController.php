<?php
namespace App\Http\Controllers\Sys;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DictController extends Controller {
	public function index()
	{
		return view('sys.dict.index');	
	}
}