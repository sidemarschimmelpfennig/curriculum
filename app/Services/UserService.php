<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;

class UserService
{
    protected $repository;
    public function __construct(UserRepository $repository)
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
        return $this->repository->create([
            'email' => $data['email'],
            'password' => $data['password'],
            'is_admin' => 1
        
        ]);
        
    }
}