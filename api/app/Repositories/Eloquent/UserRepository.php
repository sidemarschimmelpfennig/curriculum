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
    
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(int $id, array $data)
    {
        
    }

    public function delete(int $id)
    {
        return User::where('id', $id)->update([
            'active' => false

        ]);
    }

    

}