<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Types extends Model {
	protected $table = 'types';

	public function items(){
		return $this->hasMany('App\Items','types_id');
	}
}
