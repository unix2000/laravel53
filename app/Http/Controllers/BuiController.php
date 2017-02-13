<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class BuiController extends Controller {
	public function index(){
		return view('bui.index');
	}
	public function grid()
	{
		return view('bui.grid');	
	}
	public function tree()
	{
		return view('bui.tree');	
	}
	public function treeSelect()
	{
		return view('bui.tree-select');	
	}
}