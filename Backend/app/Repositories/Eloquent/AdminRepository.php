<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\AdminRepositoryInterface;
use App\Models\User;

class AdminRepository implements AdminRepositoryInterface
{
    public function getAll(){
        return Admin::all();       
    }

    public function findByID(int $id)
    {
        return Admin::find($id);
    }

    public function findAdmin(int $param)
    {
        return Admin::where('is_admin', $param);

    }

    public function create(array $data)
    {
        return Admin::create($data);
    }

}