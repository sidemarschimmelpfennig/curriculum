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
 
    public function getAllDepartament_Categories()
    {
        return $this->repository->getAllDepartament_Categories(); 

    }
    public function getAllgetAllStatus()
    {
        return $this->repository->getAllStatus(); 

    }

    public function createJob(array $validateData) 
    {
        return $this->repository->create($validateData);
       
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

    public function updateStatus(int $id, int $newStatus)
    {
        return $this->repository->updateStatus($id, $newStatus);

    }

    public function apply(int $userID, int $job_id, object $file)
    {
        return $this->repository->apply($userID, $job_id, $file);

    }

}