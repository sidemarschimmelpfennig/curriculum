<?php

namespace App\Services;

use App\Repositories\Eloquent\JobRepository;

class JobService
{
    protected $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll() 
    {
        return $this->repository->getAll();

    }

    public function findByDepartament(string $param)
    {
        return $this->repository->findByDepartament($param);

    }

    public function findByCategories(string $param)
    {
        return $this->repository->findByCategories($param);

    } 

    public function findByStatus(string $param)
    {
        return $this->repository->findByStatus($param);
        
    }

    public function findBySkills(string $param)
    {
        return $this->repository->findBySkills($param);
    }    
    
    public function findByMobilities(string $param)
    {
        return $this->repository->findBySkills($param);
    }
 
    public function getAllgetAllDepartament() { return $this->repository->getAllDepartament(); }
    public function getAllDepartament_Categories() { return $this->repository->getAllDepartament_Categories(); }
    public function getAllgetAllStatus() { return $this->repository->getAllStatus(); }

    public function createJob(array $validateData) 
    {
        $departament = $this->repository->findDepartament($validateData['departament_id']);
        $departament_categories = $this->repository->findDepartament_Categories($validateData['departament_categories_id']);
        $status = $this->repository->findStatus($validateData['status_id']);
        $skills = $this->repository->findSkills($validateData['skills_id']);
        $mobilities = $this->repository->findMobilities($validateData['mobilities_id']);   

        return $this->repository->create([
            'name' => $validateData['name'],
            'description' => $validateData['description'],

            'departament_id' => $validateData['departament_id'],
            'departament' => $departament->departament,

            'departament_categories_id' => $validateData['departament_categories_id'],
            'departament_categories' => $departament_categories->departament_categorie,

            'skills_id' => $validateData['skills_id'],
            'skills' => $skills->skills,

            'mobilities_id' => $validateData['mobilities_id'],
            'mobilities' => $mobilities->mobilities,

            'status_id' => $validateData['status_id'],
            'status' => $status->status

        ]);
        /*return [
            $departament,
            $departament_categories,
            $status,
            $skills,
            $mobilities
            
        ];*/
        
    }

    public function createDepartament(array $data)
    {
        return $this->repository->createDepartament($data);

    }
    public function createDepartamentCategory(array $data)
    {
        return $this->repository->createDepartamentCategory($data);

    }
    public function createStatus(array $data)
    {
        return $this->repository->createStatus($data);

    }

    public function createSkills(array $data)
    {
        return $this->repository->createSkills($data);
    }
    
    public function createMobilities(array $data)
    {
        return $this->repository->createMobilities($data);
    }

    public function update(int $id, int $newStatus)
    {
        return $this->repository->update($id, $newStatus);

    }

    public function apply(int $userID, int $job_id, object $file)
    {
        return $this->repository->apply($userID, $job_id, $file);

    }
}