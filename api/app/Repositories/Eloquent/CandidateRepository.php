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

    public function applyCreate(int $id, object $file, int $jobID)
    {    
        $filePath = $this->applyService->archiveFile($id, $file);
        $job = $this->jobService->findID($jobID);
        $candidate = $this->candidateFindByID($id);

        return [
            $filePath,
            $job,
            $candidate
        ];
        
        return CandidatesVagas::create([
            'job_id' => $jobID,
            'job' => $job->name,
            'candidate_id' => $id,
            'candidate_name' =>  $candidate->full_name,
            'phone' => $candidate->phone,
            'email' => $candidate->email,
            'curriculum' => $filePath
             
        ]);
    }

    public function create(array $data)
    {
       
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

    public function downloadFile(int $id)
    {
        $candidateJob = CandidatesVagas::where('candidate_id', $id)->first();
        return $candidateJob->curriculum;
        
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
