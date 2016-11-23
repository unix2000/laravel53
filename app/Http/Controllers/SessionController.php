<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Session\Session;
// use App\Http\Requests;

class SessionController extends Controller
{
    public function index()
    {
    	dump(Session::all());
    }
}
