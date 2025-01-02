<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CandidateInterface;
use App\Services\{
    ApplyService,
    JobService,
    StatusService
};

use App\Models\{
    Candidates,
    CandidatesVagas

};

use App\Events\StatusUpdatedEvent;
use Illuminate\Support\Facades\Hash;

class CandidateRepository implements CandidateInterface
{
    protected $applyService;
    protected $jobService;
    protected $statusService;

    public function __construct(
        ApplyService $applyService,
        JobService $jobService,
        StatusService $statusService
    )
    {
        $this->applyService = $applyService;
        $this->jobService = $jobService;
        $this->statusService = $statusService;
    }
    public function getAll()
    {
        return Candidates::all();
    }

    public function apply(int $jobID, int $candidateID)
    {    
        $job = $this->jobService->findID($jobID);
        $candidate = $this->candidateFindByID($candidateID);
        
        return CandidatesVagas::create([
            'job_id' => $job->id,
            'job' => $job->name,
            'candidate_id' => $candidate->id,
            'candidate_name' =>  $candidate->full_name,
            'phone' => $candidate->phone,
            'email' => $candidate->email,
            'curriculum' => $candidate->curriculum
             
        ]);
    }

    public function create(array $data)
    {
       $candidate = Candidates::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'full_name' => $data['full_name'],
            'phone' => $data['phone'],
            'additional_info' => $data['additional_info'],

        ]);
        $file = $this->applyService->archiveFile($candidate->id, $data['curriculum']);
        $candidate->update([
            'curriculum' => $file

        ]);

        return $candidate;
       
    }

    public function toCheck($credentials)
    {
        $query = Candidates::where('email', $credentials)->first();

        if($query != null)
        {
            return true;

        } else {
            return false;

        }
    }

    public function findByID(int $id)
    {
        return CandidatesVagas::find($id)->first();
        
    }

    public function candidateFindByID(int $id)
    {
        return Candidates::find($id)->first();
        
    }

    public function findByJob(int $id)
    {
        return CandidatesVagas::where('job_id', $id)->get();
        
    }

    public function findByEmail(string $param)
    {
        return Candidates::where('email', $param)->first();
        
    }

    public function downloadFile(int $id)
    {
        try {
            $candidateJob = CandidatesVagas::where('candidate_id', $id)->first();
            return $candidateJob->curriculum;
            
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao criar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }
        
        
    }

    public function update(int $id, array $data)
    {
        return Candidates::where('id', $id)->update($data);

    }
    
    public function updateStatus(int $candidateID, string $status)
    {
        try {
            $candidate = CandidatesVagas::where('id', $candidateID)->first();

            event(new StatusUpdatedEvent($candidate, $status));
            
            return $candidate->update([
                'status_curriculum' => $status
            
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao alterar status do candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }
        
    }

    public function delete(int $id) {
        return Candidates::where('id', $id)->update([
            'active' => false
        ]);
    }
    
}
