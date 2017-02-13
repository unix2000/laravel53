<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AnnotationsController extends Controller {
//class AnnotationsController {
    /**
     * Show pages
     * @Get("/anno")
     */
    public function getIndex()
    {
        // echo '<h1>Annotations Route</h1>';
        return view('annotations.index');
    }
    /**
     * Post action
     * @Post("/anno/post")
     */
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
    public function __construct() {
        $this->middleware('web');
    }
}