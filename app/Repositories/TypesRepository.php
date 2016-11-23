<?php
namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
class TypesRepository extends BaseRepository {
    public function model()
    {
        return 'App\\Models\\Types';
    }
}