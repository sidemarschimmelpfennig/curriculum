<?php

namespace App\Repositories\Eloquent;

use App\Models\Departament_Categories;
use App\Repositories\Interface\DepartamentCategoryRepositoryInterface;

class DepartamentCategoryRepository implements DepartamentCategoryRepositoryInterface
{
    public function getAll()
    {
        return Departament_Categories::all();

    }

    public function findByDepartamentCategory(string $param)
    {
        return Departament_Categories::where('departament_categorie', $param)->first();
    }

    public function create(array $data)
    {
        return Departament_Categories::create($data);
    }

    public function delete(int $id)
    {
        return Departament_Categories::where('id', $id)->update([
            'active' => false

        ]);
    }

    public function update(int $id, array $data)
    {
        return Departament_Categories::where('id', $id)->update($data);
    }

}