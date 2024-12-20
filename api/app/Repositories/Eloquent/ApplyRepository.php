<?php

namespace App\Repositories\Eloquent;

use App\Models\CandidatesVagas;
use App\Services\CandidateService;
use App\Services\JobService;

class ApplyRepository
{
    protected $jobService;
    protected $candidateService;
    public function __construct(
        JobService $jobService,
        CandidateService $candidateService

    )
    {
        $this->jobService = $jobService;
        $this->candidateService = $candidateService;
    }

    public function apply(array $data)
    {
        $job = $this->jobService->findID($data['job_id']);
        $candidate = $this->candidateService->findByID($data['candidate_id']);
        //$file = $this->

        return CandidatesVagas::create([
            'job_id' => $job->id,
            'job' => $job->name,
            'candidate_id' => $candidate->id,
            'full_name' => $candidate->full_name,
            'file' => null

        ]);
    }
}