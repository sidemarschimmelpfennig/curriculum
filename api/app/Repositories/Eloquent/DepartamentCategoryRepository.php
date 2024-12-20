<?php

namespace App\Repositories\Eloquent;

use App\Models\Departament_Categories;
use App\Repositories\Interface\DepartamentCategoryInterface;

<<<<<<< HEAD
class DepartamentCategoryRepository implements DepartamentCategoryInterface
=======
<<<<<<< HEAD
class DepartamentCategoryRepository
=======
class DepartamentCategoryRepository implements DepartamentCategoryInterface
>>>>>>> kochem
>>>>>>> 5f3901bc32c025874b4bd6f25df75d99178b1b49
{
    public function getAll()
    {
        return Departament_Categories::all();

    }

    public function findByDepartamentCategory(int $id)
    {
        return Departament_Categories::where('id', $id)->first();
    }

    public function create(array $data)
    {
        return Departament_Categories::create($data);
    }

    public function update(int $id, array $data)
    {
        return Departament_Categories::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return Departament_Categories::where('id', $id)->update(['active' => false ]);
    }


}