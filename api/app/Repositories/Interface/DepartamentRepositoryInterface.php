<?php

namespace App\Repositories\Interface;

interface DepartamentRepositoryInterface extends BaseInterface
{
    public function findByDepartamentCategory(string $param);
}
