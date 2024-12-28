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

    public function findByEmail(string $param)
    {
        return User::where('email', $param)->first();
    }
    
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(int $id, array $data)
    {
        return User::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return User::where('id', $id)->update([
            'active' => false

        ]);
    }

    

}