<?php
namespace App\Repositories;

interface DbRepositoryInterface {
    public function selectAll();
    public function find($id);
}