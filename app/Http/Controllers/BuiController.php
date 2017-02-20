<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Dept;
class BuiController extends Controller {
	protected function generateTree($id = 0, $model= null)
	{
		$data = Dept::select([ 'id' , 'dept_name' ])
			->where([ 'dept_parent' => $id ])
			->get()
			->toArray();
		$arr = array();
		foreach ( $data as $k => $v ) {
			$arr[$k]['id'] = $v['id'];
			$arr[$k]['text'] = $v['dept_name'];
			$count = Dept::where([ 'dept_parent' => $v['id'] ])->count();
			if( $count > 0 ) {
				$arr[$k]['expanded'] = false;
				$arr[$k]['children'] = $this->generateTree($v['id']);
			}
		}
		return $arr;
	}
	public function index()
	{
		return view('bui.index');
	}
	public function grid()
	{
		return view('bui.grid');	
	}
	public function bao()
	{
		$data = $this->generateTree();
		$json = json_encode($data);
		return view('bui.bx',compact('json'));	
	}
	public function tree()
	{
		$data = $this->generateTree();
		$json = json_encode($data);
		return view('bui.tree',compact('json'));	
	}
	public function gridJson(Request $req)
	{
		if($req->ajax()){
			$start = $req->input('start');
			$limit = $req->input('limit');
			$data = Items::select(['id','name','email','address','registration_date','types_id'])
				->offset($start)
				->limit($limit)
				->get()
				->toArray();
			$count = Items::count();
			$arr = array();
			$arr['rows'] = $data;
			$arr['results'] = $count;
			$arr['hasError'] = false;
			echo json_encode($arr);
		}
	}
	public function treeSelect()
	{
		return view('bui.tree-select');	
	}
	public function treeSelect2()
	{
		$data = $this->generateTree();
		$json = json_encode($data);
		return view('bui.tree-select2',compact('json'));	
	}
	public function tab()
	{
		return view('bui.tab');	
	}
	public function many()
	{
		return view('bui.many');	
	}
}