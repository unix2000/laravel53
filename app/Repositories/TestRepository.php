<?php
namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Criteria\MyCriteria;

class TestRepository extends BaseRepository {
	// protected $fieldSearchable = [
 //        'name',
 //        'email'
 //    ];
	public function boot(){
		//加入条件
		$this->pushCriteria(new MyCriteria());
	}
    public function model()
    {
        return 'App\\Items';
    }
}