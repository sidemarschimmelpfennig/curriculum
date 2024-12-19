<?php

namespace App\Repositories\Eloquent;

use App\Models\Departament_Categories;
use App\Repositories\Interface\DepartamentCategoryRepositoryInterface;

class DepartamentCategoryRepository implements DepartamentCategoryRepositoryInterface
{
    public function getAll()
    {
        return Departament_Categories::paginate(10);

    }

    public function findByDepartamentCategory(int $id)
    {
        return Departament_Categories::where('id', $id)->first();
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