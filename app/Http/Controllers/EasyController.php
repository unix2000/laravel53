<?php
namespace App\Http\Controllers;
use App\Models\Items;
use App\Models\Dept;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class EasyController extends Controller {
	protected function makeDatas( $type = 'grid' ){
		switch($type) {
			case 'grid':
				
				break;

			case 'tree':

				break;
				
			default:
		}
	}
	public function generateData(Request $req)
	{
		//json builder
		if($req->ajax()){
			//easyui- page row
			$page = $req->input('page');
			$rows = $req->input('rows');
			$offset = ($page-1) * $rows;
			$data = Items::select(['id','name','email','address'])
				->offset($offset)
				->limit($rows)
				->get()
				->toArray();
			$count = Items::count();
			$arr = [];
			$arr['rows'] = $data;
			$arr['total'] = $count;
			//$json = json_encode($arr);
			//echo $json;
			return response()->json($arr);
		}
	}
	public function grid() {		
		return view('easyui.grid',compact('json'));
	}
	public function tree()
	{
		return view('easyui.tree');	
	}
	protected function generateTree( $id = 0 ){
		//重复,未函数区分生产easyui和fancytree json格式
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
				$arr[$k]['state'] = 'closed';
				$arr[$k]['children'] = $this->generateTree($v['id']);
			}
		}
		return $arr;
		//return response()->json($arr);
		//return json_encode($arr);
	}
	public function treeJson()
	{
		$data = $this->generateTree();
		$json = json_encode($data);
		/**
		if(!file_exists('/data/dept.json')){
			file_put_contents('/data/dept.json', $json);
		} else{
			$json = file_get_contents('/data/json');
		}
		*/
		echo $json;
		
	}
	public function bao()
	{
		$data = $this->generateTree();
		$json = json_encode($data);
		return view('easyui.bx',compact('json'));	
	}
	public function tab()
	{
		return view('easyui.tab');	
	}
	public function welcome()
	{
		return view('easyui.welcome');	
	}
	public function panel()
	{
		return view('easyui.panel');	
	}
	public function accordion()
	{
		return view('easyui.accordion');	
	}
}