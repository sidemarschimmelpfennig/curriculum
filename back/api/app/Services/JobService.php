<?php

namespace App\Services;

use App\Repositories\Eloquent\JobRepository;

class JobService
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

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll() 
    {
        try {
            return response()->json($this->repository->getAll());

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function create(array $data) 
    {  
        try {
            return response()->json([
                'success' => true, 
                'job' => $this->repository->create($data)
            
            ], 200);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }
    
    public function update(int $id, array $data)
    {
        try {
            $this->repository->update($id, $data);
            return response()->json($this->repository->findID($id));

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function delete(int $id)
    {
        try {
            $this->repository->delete($id);
            return response()->json($this->repository->findID($id));
        } catch (\Throwable $th) {
            //throw $th;
        }
        

    }

    public function findID(int $id)
    {
        return $this->repository->findID($id);

    }
}