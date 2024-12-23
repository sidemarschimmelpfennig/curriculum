<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CandidateInterface;
use App\Services\{
    ApplyService,
    JobService

};

use App\Models\{
    Candidates,
    CandidatesVagas

};
class CandidateRepository implements CandidateInterface
{
    protected $applyService;
    protected $jobService;

    public function __construct(
        ApplyService $applyService,
        JobService $jobService    
    )
    {
        $this->applyService = $applyService;
        $this->jobService = $jobService;
    }
    public function getAll()
    {
        return Candidates::all();
    }

    public function applyCreate(int $id, object $file, int $jobID)
    {    
        $filePath = $this->applyService->archiveFile($id, $file);
        $job = $this->jobService->findID($jobID);
        $candidate = $this->findByID($id);
        return CandidatesVagas::create([
            'job_id' => $jobID,
            'job' => $job->name,
            'candidate_id' => $id,
            'candidate_name' =>  $candidate->full_name,
            'curriculum' => $filePath
             
        ]);
    }

    public function create(array $data)
    {
        return Candidates::create($data);
    }

    public function findByID(int $id)
    {
        return Candidates::find($id);
        
    }

    public function findByJob(int $id)
    {
        return CandidatesVagas::where('job_id', $id);
    }

    public function update(int $id, array $data)
    {
        return Candidates::where('id', $id)->update($data);
    }

    public function delete(int $id) {
        return Candidates::where('id', $id)->update([
            'active' => false
        ]);
    }

    public function findByStatus(string $param)
    {
        return Candidates::where('status', $param)->first();
        
    }
}

