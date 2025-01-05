<?php

namespace App\Repositories\Eloquent;

use App\Models\Departament;
use App\Repositories\Interface\DepartamentInterface;

class DepartamentRepository implements DepartamentInterface

{
    public function getAll()
    {
        $active = 1;
        return Departament::where('active', $active)->get();

    }

    public function create(array $data)
    {
        return Departament::create($data);
        
    }

    public function update(int $id, array $data)
    {
        return Departament::where('id', $id)->update([
            'departament' => $data['departament']
        
        ]);
    }
    
    public function delete(int $id)
    {
        return Departament::where('id', $id)->update([
            'active' => false

        ]);
        
    }

    public function findByDepartament(int $id)
    {
        return Departament::where('id', $id)->first();
        
    }

    public function findID(int $id)
    {
        
    }

}