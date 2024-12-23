<?php

namespace App\Services;
use App\Repositories\Eloquent\CandidateRepository;

class CandidateService
{
    protected $repository;

    public function __construct(CandidateRepository $repository){
        $this->repository = $repository;
    }

    public function applyCreate(int $id, object $file, int $jobID)
    {
        return $this->repository->applyCreate($id, $file, $jobID);
        
    }

    public function create(array $data)
    {
        return $this->repository->create($data);

    }

    public function findByID(int $id)
    {
        return $this->repository->findByID($id);

    }

    public function findByJob(int $id)
    {
        return $this->repository->findByJob($id);
    }
    
    public function delete(int $id)
    {
        return $this->repository->delete($id);
        
    }

    public function findByStatus(string $param)
    {
        return $this->repository->findByStatus($param);
        
    }

    public function downloadFile(int $id)
    {
        return $this->repository->downloadFile($id);

    }
}