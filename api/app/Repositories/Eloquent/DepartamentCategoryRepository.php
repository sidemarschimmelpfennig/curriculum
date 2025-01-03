<?php

namespace App\Repositories\Eloquent;

use App\Models\Departament_Categories;
use App\Repositories\Interface\DepartamentCategoryInterface;

class DepartamentCategoryRepository implements DepartamentCategoryInterface

{
    public function getAll()
    {
        $active = 1;
        return Departament_Categories::where('active', $active)->get();

    }

    public function findByDepartamentCategory(int $id)
    {
        return Departament_Categories::where('id', $id)->first();
    }

    public function findID(int $id)
    {
        
    }

    public function create(array $data)
    {
        
    }

    public function update(int $id, array $data)
    {
        
    }


    public function delete(int $id)
    {
        return Departament_Categories::where('id', $id)->update(['active' => false ]);
    }


}