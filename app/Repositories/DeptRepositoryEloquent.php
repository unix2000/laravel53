<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DeptRepository;
use App\Entities\Dept;
use App\Validators\DeptValidator;

/**
 * Class DeptRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DeptRepositoryEloquent extends BaseRepository implements DeptRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Dept::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
