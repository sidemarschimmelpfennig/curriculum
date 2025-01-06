<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Hash;
class UserService
{
    protected $repository;

    public function returnResponseTh($th)
    {
        return response()->json([
            'thLocal' => 'CandidateService',
            'success' => false,
            'th' => $th->getMessage(),
            'line' => $th->getLine(),
            'file' => $th->getfile(),
            'code' => $th->getCode()

        ], 400);
    }

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll()
    {
        try {
            return response()->json([
                'success' => true,
                'all' => $this->repository->getAll()
            ], 200);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
        
    }
    

    public function findByID(int $id)
    {
        try {
            return response()->json($this->repository->findByID($id));
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }

    public function findByEmail(string $param)
    {
        try {
            return $this->repository->findByEmail($param);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function create(array $data)
    {  
        try {
            $user = $this->repository->create([
                'full_name' => $data['full_name' ],
                'email' => $data['email' ],
                'password' => Hash::make($data['password']),
                'is_admin' => 1
            
            ]);

            return response()->json([
                'success' => true,
                'create' => $user
            ], 201);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
        
    }

    public function update(int $id, array $data)
    {
        try {
            $this->repository->update($id, $data);

            return response()->json([
                'success' => true,
                'update' => $this->repository->findByID($id)
                
            ], 200);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }        
    }

    public function delete(int $id)
    {
        try {
            $this->repository->delete($id);
            return response()->json([
                'success' => true,
                'update' => $this->repository->findByID($id)

            ], 200);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }
}