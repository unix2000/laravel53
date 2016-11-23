<?php
namespace App\Http\Controllers;

class ResourceController extends Controller {
	//annotations
	//symfony write
	/**
	* @Route("/resource/index")
	* @Method({"GET"})
	*/

	//laravel write
	/**
	* @Get("/resource/index")
	*/
	public function index(){}
	public function show(){}
	public function create(){}
	public function store(){}
	public function edit(){}
	public function update(){}
	public function destroy(){}
}