<?php
namespace App\Http\Controllers\Sys;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dept;
use App\Http\Requests\DeptRequest;
class DeptController extends Controller {
	protected $repo;
	public function __construct()
	{
			
	}
	protected function generateTree($id = 0, $model= null)
	{
		$data = Dept::select([ 'id' , 'dept_name', 'dept_no', 'dept_parent' ])
			->where([ 'dept_parent' => $id ])
			->get()
			->toArray();
		$arr = array();
		foreach ( $data as $k => $v ) {
			$arr[$k]['id'] = $v['id'];
			$arr[$k]['text'] = $v['dept_name'];
			$arr[$k]['num'] = $v['dept_no'];
			$arr[$k]['pid'] = $v['dept_parent'];
			$count = Dept::where([ 'dept_parent' => $v['id'] ])->count();
			if( $count > 0 ) {
				$arr[$k]['expanded'] = true;
				$arr[$k]['children'] = $this->generateTree($v['id']);
			}
		}
		return $arr;
	}
	public function index()
	{
		$data = $this->generateTree();
		$json = json_encode($data);
		return view('sys.dept.index',compact('json'));	
	}
	public function show($id)
	{
		$data = Dept::find($id);
		echo response()->json($data);
	}
	public function store(DeptRequest $req)
	{
		//todo server valid
		//DeptRequest
		if($req->ajax()){
			//$data = $req->input();
			$id = $req->input('id');
			$data = $req->except('_token');
			if($id){
				$model = Dept::find($id);
				$result = $model->update($data);
				$update = 1;
			} else{
				$result = Dept::create($data);
				$update = 0;
			}	
			//$data = $req->only('dept_no','dept_name','dept_parent');
			if($result){
				return response()->json([
					'status' => 1,
					'message' => 'success',
					'u' => $update,
				]);
			}
			//echo response()->json($data);
		}
	}
}