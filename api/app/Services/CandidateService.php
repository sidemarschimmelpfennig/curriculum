<?php

namespace App\Services;
use App\Repositories\Eloquent\CandidateRepository;

class CandidateService
{
    protected $repository;

    public function __construct(CandidateRepository $repository){
        $this->repository = $repository;
    }

    public function apply(int $jobID, int $candidateID)
    {
        return $this->repository->apply($jobID, $candidateID);
        
    }

    public function create(array $data)
    {
        return $this->repository->create($data);

    }

    public function toCheck($credentials)
    {
        return $this->repository->toCheck($credentials);
    }

    public function findByID(int $id)
    {
        return $this->repository->findByID($id);

    }

    public function findByJob(int $id)
    {
        return $this->repository->findByJob($id);
    }

    public function findByEmail(string $param)
    {
        return $this->repository->findByEmail($param);
        
    }
    
    public function delete(int $id)
    {
        return $this->repository->delete($id);
        
    }

    public function updateStatus(int $candidateID, string $status)
    {
        return $this->repository->updateStatus($candidateID, $status);
    }

    public function downloadFile(int $id)
    {
        return $this->repository->downloadFile($id);

    }
}