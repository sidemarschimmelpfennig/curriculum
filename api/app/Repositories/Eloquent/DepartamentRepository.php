<?php

namespace App\Repositories\Eloquent;

use App\Models\Departament;
use App\Repositories\Interface\DepartamentInterface;

<<<<<<< HEAD
class DepartamentRepository implements DepartamentInterface
=======
<<<<<<< HEAD
class DepartamentRepository
=======
class DepartamentRepository implements DepartamentInterface
>>>>>>> kochem
>>>>>>> 5f3901bc32c025874b4bd6f25df75d99178b1b49
{
    public function getAll()
    {
        return Departament::all();

    }

    public function findByDepartament(int $id)
    {
        return Departament::where('id', $id)->first();
        
    }

    public function create(array $data)
    {
        return Departament::create($data);
        
    }

    public function update(int $id, array $data)
    {
        return Departament::where('id', $id)->update($data);
    }
    
    public function delete(int $id)
    {
        return Departament::where('id', $id)->update([
            'active' => false

        ]);
        
    }

}