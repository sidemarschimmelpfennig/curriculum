<?php

namespace App\Services;

use App\Repositories\{
    Eloquent\DepartamentRepository,

    Interface\DepartamentInterface
};

class DepartamentService implements DepartamentInterface
{
    protected $repository;

    public function __construct(DepartamentRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll()
    {
        return $this->repository->getAll();

    }

    public function findByDepartament(int $id)
    {
        return $this->repository->findByDepartament($id);
        
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