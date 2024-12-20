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

    public function create(array $data)
    {
        return $this->repository->create($data);
        
    }

    public function update(int $id, int $data)
    {

    }
    
    public function updateStatus(int $id, int $newStatus)
    {
        return $this->repository->updateStatus($id, $newStatus);

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