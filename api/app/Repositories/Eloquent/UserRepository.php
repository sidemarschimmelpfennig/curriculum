<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\UserRepositoryInterface;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(){
        return User::all();       
    }

    public function findByID(int $id)
    {
        return User::find($id);
    }
    
    public function create(array $data)
    {
        return User::create($data);
    }

}