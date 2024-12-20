<?php

namespace App\Services;

use App\Repositories\Eloquent\SkillsRepository;

class SkillsService
{
    protected $repository;

    public function __construct(SkillsRepository $repository)
    {
        $this->repository = $repository;

    }
    
    public function getAll()
    {
        return $this->repository->getAll();

    }

    public function findBySkill(int $id)
    {
        return $this->repository->findBySkill($id);
    }
    
    public function create(array $data)
    {
        return $this->repository->create($data);

    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);

    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);

    }
}