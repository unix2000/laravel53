<?php
namespace App\Http\Controllers;

class MiddleController extends Controller {
    public function index(){

    }
    protected function one(){
        return 'This is step one';
    }
    public function two(){
        return 'This is step two ';
    }
    public function three(){
        return 'This is step three';
    }
}