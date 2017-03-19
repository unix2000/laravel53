<?php
namespace App\Models;

use Eloquent as Model;
class Dept extends Model {
	public $table = 'department';
	protected $fillable = [
		'dept_no',
		'dept_name',
		'dept_parent'	
	];
	public $timestamps = false;
}