<?php
namespace App\Repositories;

use App\Items;

class ItemRepository implements DbRepositoryInterface {
    public function selectAll()
    {
        return Items::all();
    }
    public function find($id)
    {
        return Items::find($id);
    }
}