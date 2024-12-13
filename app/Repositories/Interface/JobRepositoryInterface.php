<?php

namespace App\Repositories\Interface;
interface JobRepositoryInterface extends BaseInterface
{
    public function findByDepartment(string $param);
    public function findByCategories(string $param);    
    public function findByStatus(string $param);
    public function update(int $id, int $newStatus);

    public function getAllDepartament();
    public function findDepartament(string $id);

    public function getAllDepartament_Categories();
    public function findDepartament_Categories(string $id);

    public function getAllStatus();
    public function findStatus(string $id);

    public function apply(int $userID, int $job_id, object $file);

}