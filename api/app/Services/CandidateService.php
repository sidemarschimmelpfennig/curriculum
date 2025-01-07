<?php

namespace App\Services;
use App\Repositories\Eloquent\CandidateRepository;

class CandidateService
{
    protected $repository;
    public function __construct(CandidateRepository $repository)
    { 
        $this->repository = $repository; 
    }

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
            ], 201);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function apply(int $jobID, int $candidateID)
    {
        try {
            $apply = $this->repository->apply($jobID, $candidateID);

            if($apply == false)
            {
                return response()->json([
                    'success' => false,
                    'apply' => $apply
    
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'apply' => $apply
    
                ]);
            }

            return response()->json([
                $this->repository->apply($jobID, $candidateID)
            
            ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'thLocal' => 'CandidateService',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
                'code' => $th->getCode()

            ], 400);
        }
        
        
    }

    public function toCheckEmail(string $email)
    {
        try {
            $exists = $this->repository->toCheckEmail($email);

            if($exists == true)
            {
                return response()->json([
                    'message' => 'Esse e-mail já está cadastrado'
    
                ]);
            } 
    
            return response()->json(false);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function toCheckCPF(string $cpf)
    {
        try {
            $exists = $this->repository->toCheckCPF($cpf);

            if($exists == true)
            {
                return response()->json([
                    'message' => 'Esse CPF já está cadastrado'
    
                ]);
            } 
    
            return response()->json(false);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }
    
    public function candidateFindByID(int $id)
    {
        try {
            return $this->repository->candidateFindByID($id);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
        
    }

    public function findByID(int $id)
    {
        try {
            return $this->repository->findByID($id);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
        
    }

    public function findByJob(int $id)
    {
        try {
            $candidate = $this->repository->findByJob($id);
            if($candidate)
            {
                return response()->json($candidate);

            } else {
                return response()->json('Não tem candidatos aplicados para essa vaga');

            }
            
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
    
    public function delete(int $id)
    {
        try {
            $this->repository->delete($id);
            $candidate = $this->repository->findByID($id);
            return response()->json($candidate);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }       
    }

    public function updateStatus(int $candidateID, string $status)
    {
        try {
            $this->repository->updateStatus($candidateID, $status);
        
            return response()->json([
                'success' => true,
                'status' => $status,
                'candidate' => $this->repository->findByID($candidateID)
            ], 200);

            return $this->repository->updateStatus($candidateID, $status);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function downloadFile(int $id)
    {
        try {
            $directory = $this->repository->downloadFile($id);
            if($directory)
            {
                return response()->download($directory);
    
            } else {
                return response()->json([
                    'erro' => 'Erro, arquivo não encontrado',
    
                ]);
            }
            //return $this->repository->downloadFile($id);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
        
    }
    
    public function countCandidate(int $jobID)
    {
        return $this->repository->countCandidate($jobID);

    }
}