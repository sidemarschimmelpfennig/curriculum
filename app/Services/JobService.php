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

    public function findByDepartment(string $param)
    {
        return $this->repository->findByDepartment($param);

    }

    public function findByCategories(string $param)
    {
        return $this->repository->findByCategories($param);

    } 

    public function findByStatus(string $param)
    {
        return $this->repository->findByStatus($param);
        
    }

    public function create(array $validateData) 
    {
        return $this->repository->create($validateData);   
        
    }

    public function update(int $id, int $newStatus){
        return $this->repository->update($id, $newStatus);

    }
}