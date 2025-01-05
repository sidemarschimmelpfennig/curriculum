<?php

namespace App\Services;

use App\Repositories\{
    Eloquent\DepartamentRepository,

    Interface\DepartamentInterface
};

class DepartamentService implements DepartamentInterface
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

    public function __construct(DepartamentRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll()
    {
        try {
            return response()->json([
                'success' => false, 
                'all' => $this->repository->getAll()
            
            ]);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function create(array $data)
    {
        try {
            return response()->json([
                'success' => true, 
                'create' => $this->repository->create($data)]);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }

    public function update(int $id, array $data)
    {
        try {
            return response()->json([
                'success' => true, 
                'update' => $this->repository->update($id, $data)
            ]);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return response()->json([
                'success' => true, 
                'delete' => $this->repository->findByDepartament($id)
                
            ]);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }

    }

    public function findByDepartament(int $id)
    {
        return $this->repository->findByDepartament($id);
        
    }

    public function findID(int $id){}
}