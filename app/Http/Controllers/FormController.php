<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Http\Requests;
class FormController extends Controller
{
    public function validator()
	{
		//Validform_v5.3.2 jquery库
		return view('form.validator');	
    }
	public function validatorForm(Request $req)
	{
		if($req->isMethod('post')){
			//$rules = ['verfiy' => 'required|captcha'];
            //$validator = Validator::make(Input::all(), $rules);
			$this->validate($req,[
				'username' => 'required',
				'passwd' => 'required',
				'captcha' => 'required|captcha'
			]);
			//print_r('ok');
			//return redirect(route('form.valid'));
			return redirect('form/valid');
		}
	}
	public function valid()
	{
		//nice valid jquery
		return view('form.valid');
    }
	public function validForm(Request $req)
	{
		$this->validate($req, [
	        'title' => 'required|is_odd_string',
	    ]);
		print_r('done');
	}
	public function index()
    {
        return view('form.index');
    }
    public function store(Request $req)
    {
        if ($req->isMethod('post')) {
        	// echo '<h1>Post</h1>';
           	// dump($req);
            $token = $req->input("_token");
            $csrf = csrf_token();
            echo "token:".$token."<br />";
            echo "csrf:".$csrf."<br />";
        }
    }
}
