<?php

namespace App\Repositories\Interface;

interface DepartamentCategoryInterface extends BaseInterface
{
    public function findByDepartamentCategory(int $id);

}
