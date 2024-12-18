<?php

namespace App\Services;

use App\Repositories\Eloquent\AdminRepository;

class AdminService
{
    protected $repository;
    public function __construct(AdminrRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll() 
    {
        return $this->repository->getAll();

    }

    public function findByID(int $id)
    {
        return $this->repository->findByID($id);

    }

    public function findAdmin(int $param)
    {
        return $this->repository->findAdmin($param);
    }

    public function create(array $data)
    {  
        return $this->repository->create($data);
        
    }
}