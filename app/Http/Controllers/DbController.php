<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\DbRepositoryInterface;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Items;
use App\Models\Types;
//fractal
use League\Fractal\Manager;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use App\Transformer\ItemsTransformer;

class DbController extends Controller
{
    protected $db;
	public function __construct(DbRepositoryInterface $db)
    {
    	$this->db = $db;
    }
    public function fractal()
    {
		//fractal api data
		$manager = new Manager();
		$manager->setSerializer(new DataArraySerializer());
		
		//单条记录为Item,多条为Collection
		$data = Items::find(1);
		$resource = new Item($data, new ItemsTransformer());

		// $data = Items::limit(5)->get();
		// $resource = new Collection($data, new ItemsTransformer());

		$manager->parseIncludes('characters');
		// $api_data = $manager->createData($resource)->toArray();
		$api_data = $manager->createData($resource)->toJson();
		dump($api_data);
		//dump($manager);
		//dump($data);

		//正常 //array为参数
		// $fractal = new Manager();
		// $books = [
		// 	[
		// 		'id' => '1',
		// 		'title' => 'Hogfather',
		// 		'yr' => '1998',
		// 		'author_name' => 'Philip K Dick',
		// 		'author_email' => 'philip@example.org',
		// 	],
		// 	[
		// 		'id' => '2',
		// 		'title' => 'Game Of Kill Everyone',
		// 		'yr' => '2014',
		// 		'author_name' => 'George R. R. Satan',
		// 		'author_email' => 'george@example.org',
		// 	]
		// ];

		// $resource = new Collection($books, function(array $book) {
		//     return [
		//         'id'      => (int) $book['id'],
		//         'title'   => $book['title'],
		//         'year'    => (int) $book['yr'],
		//         'author'  => [
		//         	'name'  => $book['author_name'],
		//         	'email' => $book['author_email'],
		//         ],
		//         'links'   => [
		//             [
		//                 'rel' => 'self',
		//                 'uri' => '/books/'.$book['id'],
		//             ]
		//         ]
		//     ];
		// });

		// Turn that into a structured array (handy for XML views or auto-YAML converting)
		// $array = $fractal->createData($resource)->toArray();
		// Turn all of that into a JSON string
		// echo $fractal->createData($resource)->toJson();	

		//参数为item 如Items::find(1)
		//new Fractal\Resource\Item($book, function(Book $book)
		
		//参数为collection 如Items::all()
		//$resource = new Fractal\Resource\Collection($books, function(Book $book) {	
	}
    public function zui(){
    	return view('db.zui');
    }
	public function test(){
		// dump($this->db->find(1));
		//dump(Items::findOrfail(1));
		//一对一
		$items = \App\Items::find(1);
		dump($items->types);
		//一对多
		// $types = Types::find(1);
		// dd($types);	
		// dump($types->items); //不需要括号
		// foreach ($types->items as $v) {
		// 	echo $v->name .'=='. $v->email . '==' .$v->address . "<br />";
		// }
	}
	public function index(Request $req)
	{
		// DB
		// $data = DB::table('items')->limit(10)->get();
		// $data = DB::table('items')->where(['email'=>'liner.xie@qq.com'])->get();
		// $data = DB::table('items')->where('email','liner.xie@qq.com')->get();

		//单个行或列
		// $data = DB::table('items')->where('email','liner.xie@qq.com')first();
		// $data = DB::table('items')->where('email','liner.xie@qq.com')->value('name');

		// $data = DB::select('select id,name,email from items where id = ?',[1]);
		// $data = DB::select('select id,name,email from items where id = :id',['id'=> 1]);

		//return 'liner.xie@qq.com' => string 'xiexiaolin17993' 单行单列
		// $data = DB::table('items')->where('email', 'liner.xie@qq.com')->pluck('name','email');
		//多列
		// $data = DB::table('items')->select('id','name as user_name','email')->where('email', 'liner.xie@qq.com')->get();
		//addSelect()
		// $query = DB::table('items')->select('name');
		// $data = $query->addSelect('email')->get();
		// $data = DB::table('items')
  //           ->where('id', '>', 100)
  //           // ->orWhere('email', 'liner.xie@qq.com')
  //           ->get();
		//whereNotBetween 
		// $data = DB::table('items')
  //     		->whereBetween('id', [1, 100])
  //     		->get();
		//whereNotIn
		// $data = DB::table('items')
  //     		->whereIn('id', [1, 2, 3])->get();
		//whereNotNull
		// $data = DB::table('items')
  //     		->whereNull('deleted_at')->get();

		//动态where
		// $data = DB::table('items')->whereId(1)->first();
		// $data = DB::table('items')
  //     		->whereIdAndEmail(2, 'liner.xie@qq.com')
  //     		->first();
		// $data = DB::table('items')
  //   		->whereIdOrEmail('1', 'liner.xie@qq.com')
  //   		->first();

		// $data = DB::table('items')
  //     		->orderBy('name', 'desc')
  //     		// ->groupBy('count')
  //     		// ->having('count', '>', 100)
  //     		->get();
      	//偏移 限制
      	// $data = DB::table('items')->skip(10)->take(5)->get();
		// $result = DB::statement('drop table items');
		// DB::table('items')->chunk(10,function($items){
		// 	foreach ($items as $k => $v) {
		// 		echo $k . '---' . $v->name . '<br />';
		// 	}
		// });

		// max min avg sum
		// $data = DB::table('items')->count();
		// $data = DB::table('items')->sum('id');

		// join
		// DB::table('items')->leftJoin()
		// $data = DB::table('items')
		// 	->join('types','types.id','=','items.types_id')
		// 	->select('types.id','types.name as types_name','items.name','items.email')
		// 	->where('types.id','2')
		// 	->where('items.email','liner.xie@qq.com')
		// 	->get();

		//raw表达式
		$data = DB::table('items')
	       	->select(DB::raw('count(*) as count,email'))
	       	->where('types_id', '<>', 1)
	       	->groupBy('email')
	       	->get();
		// dump($data);
		// DB::beginTransaction();
		// DB::rollBack();
		// DB::commit();

		// DB::select('select * from tables')
		// DB::insert('insert into tables')
		// DB::update('update tables')
		// DB::delete('delete from tables where id = ?',[2])
		// DB::delete('delete from tables where id = :id',['id'=>2]);

		// DB::table('items')->insert([])
		// DB::table('items')->update([])
		// DB::table('items')->delete()
		// DB::table('items')->select()
		// DB::table('items')->increment('count')
		// DB::table('items')->decrement('count')
		
		// ORM
		// $data = Items::limit(10)->get();
		//$data = Items::find(1);

		// $data = Items::where(['id' => 1])
		// 	->where(['email' => 'liner.xie@qq.com'])
		// 	->get();
		//return view('db.index',compact('data'));
		// return  view('db.index',['data' => $data]);

		//page
		// dump($req->session()->all());
	    // $data = DB::table('items')->paginate(12);
       	// return view('db.index', ['data' => $data]);
	    $data = Items::offset(10)->limit(10)->get()->toArray();
	    dump($data);
		// return view('db.index')->with('data',Items::paginate(9));

		// $data = \App\User::findForPassport("13900000000");
  	// dump($data);
	}
}
