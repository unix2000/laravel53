<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
    public function types(){
    	// return this->belongsTo('App\Models\Types','types_id','id');
    	return  $this->belongsTo('App\Models\Types'); 
    }
}
