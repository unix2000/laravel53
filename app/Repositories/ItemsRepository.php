<?php

namespace App\Repositories;

use App\Models\Items;
use InfyOm\Generator\Common\BaseRepository;

class ItemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Items::class;
    }
}
