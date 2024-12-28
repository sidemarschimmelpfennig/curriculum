<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Hash;
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

    public function findByEmail(string $param)
    {
        return $this->repository->findByEmail($param);
        
    }

    public function create(array $data)
    {  
        return $this->repository->create([
            'name' => $data['name' ],
            'email' => $data['email' ],
            'password' => Hash::make($data['password']),
            'is_admin' => 1
        
        ]);
        
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
        
    }
}