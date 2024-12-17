<?php

namespace App\Repositories\Interface;
interface JobRepositoryInterface extends BaseInterface
{

    public function updateStatus(int $id, int $newStatus);

    // Departament
    public function getAllDepartament();
    public function findByDepartament(string $param);
    public function findDepartament(string $id);
    public function deleteDepartament(int $id);

    // Departament category
    public function getAllDepartament_Categories();
    public function findByCategories(string $param);    
    public function findDepartament_Categories(string $id);

    // Status
    public function getAllStatus();
    public function findByStatus(string $param);
    public function findStatus(string $id);

    // Skills
    public function findBySkills(string $param);
    public function findSkills(int $id);
    
    // Mobilities
    public function findByMobilities(string $param);
    public function findMobilities(int $id);


    public function apply(int $userID, int $job_id, object $file);

}