<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\AdminRepositoryInterface;

use App\Models\User;

class AdminRepository implements AdminRepositoryInterface
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

    public function delete(int $id)
    {
        return User::where('id', $id)->update([
            'active' => false

        ]);
    }

    

}