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

    public function createJob(array $validateData) 
    {
        return $this->repository->create($validateData);
       
    }
   
    public function updateStatus(int $id, int $newStatus)
    {
        return $this->repository->updateStatus($id, $newStatus);

    }
}