<?php
namespace App\Http\Controllers\Human;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class EmployeeController extends Controller {
	public function index()
	{
		return view('hr.employee.index');	
	}
}