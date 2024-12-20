<?php

namespace App\Services;

use App\Repositories\Eloquent\StatusRepository;
use App\Repositories\Interface\StatusInterface;

class StatusService implements StatusInterface
{
    protected $repository;

    public function __construct(StatusRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll()
    {
        return $this->repository->getAll();

    }

    public function findByStatus(int $id)
    {
        return $this->repository->findByStatus($id);
        
    }

    public function findID(int $id)
    {
        
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);

    }

    public function create(array $data)
    {
        return $this->repository->create($data);

    }

    public function delete($id)
    {
        return $this->repository->delete($id);
        
    }
}