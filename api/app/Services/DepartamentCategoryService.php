<?php

namespace App\Services;

use App\Repositories\Eloquent\DepartamentCategoryRepository;

class DepartamentCategoryService
{
    protected $repository;

    public function __construct(DepartamentCategoryRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll()
    {
        return $this->repository->getAll();

    }

    public function findByDepartamentCategory(string $param)
    {
        return $this->repository->findByDepartamentCategory($param);
        
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