<?php

namespace App\Services;

use App\Repositories\Eloquent\DepartamentCategoryRepository;
use App\Repositories\Interface\DepartamentCategoryInterface;

class DepartamentCategoryService implements DepartamentCategoryInterface
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

    public function findByDepartamentCategory(int $id)
    {
        return $this->repository->findByDepartamentCategory($id);
        
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