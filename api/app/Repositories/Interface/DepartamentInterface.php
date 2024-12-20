<?php

namespace App\Repositories\Interface;

interface DepartamentInterface extends BaseInterface
{    
    public function findByDepartament(int $id);

}
