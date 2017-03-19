<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helper\DataViewer;

/**
 * Class Items
 * @package App\Models
 * @version September 14, 2016, 7:02 pm CST
 */
class Items extends Model
{
    use SoftDeletes;
	use DataViewer;

    public $table = 'items';
    

    protected $dates = ['deleted_at'];
	

    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
	
	public static $columns = [
		'id','name','email','address',
		//'types_id','registration_date','deleted_at'
	];
    
}
