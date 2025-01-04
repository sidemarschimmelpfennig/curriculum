<?php

namespace App\Services;

use App\Repositories\Eloquent\DepartamentCategoryRepository;
use App\Repositories\Interface\DepartamentCategoryInterface;

class DepartamentCategoryService implements DepartamentCategoryInterface
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

    public function __construct(DepartamentCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        try {
            return response()->json([
                'success' => true, 
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
                'create' => $this->repository->create($data)

            ]);

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
                'update' => $this->repository->findByDepartamentCategory($id)

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
                'delete' => $this->repository->findByDepartamentCategory($id)
            ]);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }   
    }

    public function findByDepartamentCategory(int $id)
    {
        try {
            return $this->repository->findByDepartamentCategory($id);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function findByID(int $id){}   
}