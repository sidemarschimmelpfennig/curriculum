<?php

namespace App\Repositories\Interface;
interface JobRepositoryInterface extends BaseInterface
{
    public function findByDepartment(string $param);
    public function findByCategories(string $param);    
    public function findByStatus(string $param);
    public function update(int $id, int $newStatus);

}