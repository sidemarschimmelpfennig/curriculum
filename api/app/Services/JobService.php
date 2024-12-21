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

    public function create(array $validateData) 
    {
        return $this->repository->create($validateData);
       
    }
   
    public function updateStatus(int $id, int $newStatus)
    {
        return $this->repository->updateStatus($id, $newStatus);

    }
    
    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);

    }

    public function findID(int $id)
    {
        return $this->repository->findID($id);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);

    }
    
}