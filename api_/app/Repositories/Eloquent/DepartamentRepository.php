<?php

namespace App\Repositories\Eloquent;

use App\Models\Departament;
use App\Repositories\Interface\DepartamentRepositoryInterface;

class DepartamentRepository implements DepartamentRepositoryInterface
{
    public function getAll()
    {
        return Departament::all();

    }

    public function create(array $data)
    {
        return Departament::create($data);
        
    }

    public function findByDepartament(string $param)
    {
        return Departament::where('departament', $param)->first();
        
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