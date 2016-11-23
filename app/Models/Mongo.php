<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Mongo extends Eloquent {
	//Eloquent
	protected $connection = 'mongodb';
	//mysql $table = ''
	protected $collection = "customer";
}