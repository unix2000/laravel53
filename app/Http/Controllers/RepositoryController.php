<?php
namespace App\Http\Controllers;

use App\Repositories\TestRepository;
use App\Repositories\TypesRepository;
use App\Criteria\MyCriteria;

class RepositoryController extends Controller {
    protected $items;
    protected $types;
    public function __construct(TestRepository $items, TypesRepository $types){
        $this->items = $items;
        $this->types = $types;
    } 
    public function index(){
//         $data = $this->items->find('1',['id','name','email']);
//         $data = $this->items->first();
//         $data = $this->items->paginate(10,['id','name','email']);
    	//关联数据with
    	// $data = $this->items->with(['types'])->find(1);
    	// $data = $this->types->with('items')->find(1);

    	// $result = $this->items->create( Input::all() );
    	// $result = $this->items->update( Input::all(), 1 );
    	// $result = $this->items->delete(1);

    	//加入条件,苛放入repository boot函数
    	// $this->items->pushCriteria(new MyCriteria());
    	// $data = $this->items->all();

    	//作用等同上面两行
    	// $data = $this->items->getByCriteria(new MyCriteria());

    	//放入boot直接过滤
    	$data = $this->items->all();
        dump($data);
    }
}