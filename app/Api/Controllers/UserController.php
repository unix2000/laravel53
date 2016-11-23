<?php
namespace App\Api\Controllers;
use App\User;
use JWTAuth;

class UserController extends BaseController {
	public function index(){
		return User::all();
	}
	public function show($id){
		// http://laravel53.dev/api/users/1
		$user = User::findOrFail($id);
    return $this->response->array($user->toArray());
    // return $this->response->item($user, new UserTransformer);

    //return page
    // $users = User::paginate(25);
    // return $this->response->paginator($users, new UserTransformer);


    // return $this->response->noContent();
    // return $this->response->created();
	}

	//获取用户信息
	public function me()
  {
    //return $this->response->array($this->auth->user());
	return JWTAuth::parseToken()->authenticate();
  }
  //更新用户信息
  public function up()
  {
      // TODO
  }
}