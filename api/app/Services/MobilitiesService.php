<?php

namespace App\Services;

use App\Repositories\Eloquent\MobilitiesRepository;

class MobilitiesService
{
    protected $repository;

    public function __construct(MobilitiesRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findByMobilities(int $id)
    {
        return $this->repository->findByMobilities($id);

    }

    public function create($data)
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