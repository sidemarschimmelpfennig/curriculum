<?php

namespace App\Repositories\Interface;

interface DepartamentCategoryRepositoryInterface extends BaseInterface
{
    public function findByDepartamentCategory(int $id);

}
