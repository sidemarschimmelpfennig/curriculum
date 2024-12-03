<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function getAll(){
        return User::all();       
    }

    public function findByID(int $id)
    {
        return User::find($id);
    }

    public function findAdmin(int $param)
    {
        return User::where('is_admin', $param);

    }

    public function create(array $data)
    {
        return User::create($data);
    }

}