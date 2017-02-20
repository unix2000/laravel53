<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Requests;
use Charts;
use App\Models\Items;
use App\Models\Dept;
class UiController extends Controller {
	protected function generateTree($id = 0, $model= null)
	{
		$data = Dept::select([ 'id' , 'dept_name' ])
			->where([ 'dept_parent' => $id ])
			->get()
			->toArray();
		$arr = array();
		foreach ( $data as $k => $v ) {
			$arr[$k]['key'] = $v['id'];
			$arr[$k]['title'] = $v['dept_name'];
			$count = Dept::where([ 'dept_parent' => $v['id'] ])->count();
			if( $count > 0 ) {
				$arr[$k]['folder'] = true;
				$arr[$k]['children'] = $this->generateTree($v['id']);
			}
		}
		return $arr;
	}
	public function ztree()
	{
		//simple json
		/**
		var setting = {
			data: {
                simpleData: {
                    enable: true
                }
            },
		}
		**/
		//id pid模型，非左右节点模型
		$data = Dept::select(['id','dept_parent as pId','dept_name as name'])
			->get()
			->toArray();
		$json = json_encode($data);
		//return view('ui.ztree',compact('json'));
		return view('ui.ztree',[
			'data' => $json
		]);
	}
	public function fancytree()
	{
		$data = $this->generateTree();
		$json = json_encode($data);
		return view('ui.fancytree',compact('json'));	
	}
	public function uikit()
	{
		return view('ui.uikit');	
	}
	public function dtGrid()
	{
		return view('ui.dtgrid');
	}
	public function getDatas(Request $req)
	{
		//ajax获取必须返回Pager对象,非ajax获取返回json数组即可
		// {"advanceQueryConditions":[],"advanceQuerySorts":[],"exhibitDatas":[],"exportAllData":false,"exportColumns":[],"exportDataIsProcessed":false,"exportDatas":[],"exportFileName":"","exportType":"","fastQueryParameters":{},"isExport":false,"isSuccess":true,"nowPage":1,"pageCount":20,"pageSize":10,"parameters":{},"recordCount":200,"startRecord":0}
		//laravel需要验证csrfToken,可middleware中关闭此路由
		if ($req->ajax()) {
			$dtpage = $req->input('gridPager'); //传过来是json对象
			$dt_arr = json_decode($dtpage,true);
			$page = $dt_arr['pageSize'];
			$startRecord = $dt_arr['startRecord'];
			$data = Items::offset($startRecord)
				->limit($page)
				->get()
				->toArray();
			$data['exhibitDatas'] = $data;		
			$data['isSuccess'] = true; //此参数ajax分页很重要,要不提示callback错误 很奇怪 因为不是jsonp获取
			//以下三参数必须加入,要不前端出现undefine错误
			$data['recordCount'] = Items::count();
			$data['pageCount'] = (int)(Items::count() / $page);
			$data['pageSize'] = $page;
			$data['startRecord'] = $dt_arr['startRecord'];
			$data['nowPage'] = $dt_arr['nowPage'];
			echo json_encode($data);
		}
	}
	public function ajaxLoadMore(Request $req)
	{
		$datas = Items::paginate(6);

    	if ($req->ajax()) {
    		$view = view('ui.data',compact('datas'))->render();
            return response()->json(['html'=>$view]);
        }

    	return view('ui.ajax-load-more',compact('datas'));
	}
	public function index()
	{
		// $chart = Charts::create('line', 'highcharts')
  //           ->setTitle('highcharts图表')
  //           ->setLabels(['First', 'Second', 'Third'])
  //           ->setValues([5,10,20])
  //           ->setDimensions(660,360)
  //           ->setResponsive(true);
      //   $chart = Charts::multi('line', 'highcharts')
		    // ->setColors(['#ff0000', '#00ff00', '#0000ff'])
		    // ->setLabels(['One', 'Two', 'Three'])
		    // ->setDataset('Test 1', [1,2,3])
		    // ->setDataset('Test 2', [0,6,0])
		    // ->setDataset('Test 3', [3,4,1]);
		// $chart = Charts::database(Items::all(),'bar','highcharts');
		$chart = Charts::database(Items::limit(10)->get(),'bar','highcharts')
			->setElementLabel("email")
		    ->setDimensions(520, 360)
		    ->setResponsive(true)
		    ->groupBy('email');;
		// dump($chart);
        return view('ui.index', ['chart' => $chart]);
	}
	public function semantic()
	{
		return view('ui.semantic');	
	}
	public function login()
	{
		return view('ui.login');	
	}
	public function tests()
	{
		return view('ui.tests');	
	}
	public function card()
	{
		return view('ui.card');	
	}
}
