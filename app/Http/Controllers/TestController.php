<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Items;
use Hash;
use Crypt;
use Input;
use JWTAuth;
use JWTFactory;
use Tymon\JWTAuth\Providers\Auth\AuthInterface;
use Tymon\JWTAuth\Providers\User\UserInterface;

class TestController extends Controller
{
    protected $user;
    protected $auth;
    public function __construct(UserInterface $user, AuthInterface $auth){
        $this->user = $user;
        $this->auth = $auth;
    }
    
    public function detoken(){
        // sub Subject - This holds the identifier for the token (defaults to user id)
        // iat Issued At - When the token was issued (unix timestamp)
        // exp Expiry - The token expiry date (unix timestamp)
        // nbf Not Before - The earliest point in time that the token can be used (unix timestamp)
        // iss Issuer - The issuer of the token (defaults to the request url)
        // jti JWT Id - A unique identifier for the token (md5 of the sub and iat claims)
        // aud Audience - The intended audience for the token (not required by default)
        
        // "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xhcmF2ZWw1My5kZXZcL2FwaVwvYXV0aFwvdG9rZW4iLCJpYXQiOjE0Nzg5NTgyNDksImV4cCI6MTQ3ODk2MTg0OSwibmJmIjoxNDc4OTU4MjQ5LCJqdGkiOiI0YWMxZjg4MWQ1MGM2OWJkZjY1YmNiOTQwOTAyZDNkZSJ9.MS-d9oYnJxcuJ9DUQubszOvYBxY1bNXA-ttK1XiFr6E"

        // $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6XC9cL2xhcmF2ZWw1My5kZXZcL2FwaVwvYXV0aFwvdG9rZW4iLCJpYXQiOjE0Nzg5NTk5OTQsImV4cCI6MTQ3ODk2MzU5NCwibmJmIjoxNDc4OTU5OTk0LCJqdGkiOiIxY2ZhMzBhOWY3MGJmOWI4NDQ5NGY0NWIxZDFlMDFmMiJ9.0TTQWuKJR-KeRdjoukpV1mEnTB_wnrsdqEqWTcqfDyw";
        //token过期 jwt.php ssl=>60 minutes

        //token解密
        // $user = JWTAuth::toUser($token);
        // dump($user->email);
        // dump($this->auth->user());
        // dump($this->user);

        //加密
        // $customClaims = ['foo' => 'bar', 'baz' => 'bob'];
        // $payload = JWTFactory::make($customClaims);
        // add a custom claim with a key of `foo` and a value of ['bar' => 'baz']
        $payload = JWTFactory::sub(123)->aud('foo')->foo(['bar' => 'baz'])->make();
        $token = JWTAuth::encode($payload);
        return $token;
    }
    //rest resource
    public function index(Items $items)
    {
        //restful get
        // return Items::all();
        return Items::paginate(10);
        // return $items;
    }
    public function show($id)
    {
        //restful get
        //model binding简化代码 app\Providers\RouteServiceProvider.php
        // function boot(Router $router){
        //     parent::boot($router);
        //     $router->model('items','\App\Models\Items');
        // }

        //index show store destory都传入Items $items达到简化代码的目的
        // /items/1
        // public function(Items $items){
        //     return $items;
        // }
        // return Items::findOrFail($id);
    }
    public function store()
    {
        // //restful post call
        // $input = Input::json();
        // $model = new Items;
        // $model->name = $input->get('name');
        // $model->emal = $input->get('email');
        // $model->save();
        // return response($model,201);
    }
    public function update($id)
    {
        //restful put call
        // $input = Input::json();
        // $data = Items::findOrFail($id);
        // $data->name = $input->get('name');
        // $data->emal = $input->get('email');
        // $data->save();
        // return response($data,200)
        //     ->header('Content-Type','application/json');
    }
    public function destroy($id)
    {
        //restful delete call
        // public function destroy(Items $items){
        //     $items->delete();
        //     return response('Deleted',200);
        // }
        $model = Items::find($id);
        $model->delete();
        return response('Deleted',200);
    }
    // public function search(Request $req,Items $items)
    // {
    //     return $items->where('name','like','%'.$req->get('name').'%')->get();
    // }
    public function helper()
    {
    	// $str = Hash::make('secretpassword');
    	// $str = Crypt::encrypt('secretstring');
    	// $str_ = Crypt::decrypt($str);
    	// dump($str);
    	// dump($str_);

    	//array helper

    	//collect
    	// dump(collect(['xiao', 'lin', 'liner']));
    	// $c = collect(['xiao', 'lin', 'liner']);
    	$c = collect(['1','2','3','4','5','6','6']);
    	// dd($c->toJson());
    	// dump($c->toArray());
    	// dd($c->avg());
    	// dd($c->min());
    	// dd($c->count());
    	// dd($c->chunk(3));
    	
    	// $c->each(function($k,$v){
    	// 	echo $k . '->' . $v .'<br />';
    	// });

    	// dump($c->implode('product', ', '));
    	dump($c->reverse());
    	dump($c->shuffle());

    }
}
