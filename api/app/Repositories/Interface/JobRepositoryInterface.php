<?php

namespace App\Repositories\Interface;

interface JobRepositoryInterface extends BaseInterface
{
    public function updateStatus(int $id, int $newStatus);

<<<<<<< HEAD
=======
    // Departament category
    public function getAllDepartament_Categories();
    public function findByCategories(string $param);    
    
    // Status
    public function getAllStatus();
    public function findByStatus(int $id) ;
    public function findStatus(string $id);

    // Skills
    public function findBySkills(string $param);
    public function findSkills(int $id);
    
    // Mobilities
    public function findByMobilities(string $param);
    public function findMobilities(int $id);


    public function apply(int $userID, int $job_id, object $file);

>>>>>>> 8928fb49deea1f238af0853b2e6eda793a9e5c26
}