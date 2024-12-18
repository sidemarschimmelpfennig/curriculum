<?php

namespace App\Services;

use App\Repositories\Eloquent\DepartamentRepository;

class DepartamentService
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

    public function findByDepartament(string $param)
    {
        return $this->repository->findByDepartament($param);
        
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