<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CandidateInterface;

use App\Models\{
    Candidates,
    JobVacancies,
    CandidatesVagas

};
use App\Services\CandidateService;
use Illuminate\Support\Facades\Hash;

class CandidateRepository implements CandidateInterface
{
    public function getAll()
    {
        return Candidates::all();
    }

    public function jobApply(int $candidateID, int $jobId, object $pathfile)
    {
        $user = Candidates::where('id', $candidateID)->first();
        $job = JobVacancies::where('id', $jobId)->first();
        
        return CandidatesVagas::create([
            'job_id' => $jobId,
            'job' => $job->name,
            'candidate_id' => $candidateID,
            'full_name' => $user->full_name,
            'file' => $pathfile 
            
        ]);

    }

    public function create(array $data){
        return Candidates::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'additional_info' => $data['additional_info'],
            'file' => $data['file'],

        ]);
    }

    public function findByID(int $id)
    {
        return Candidates::find($id);
        
    }

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id) {
        return Candidates::where('id', $id)->update([
            'active' => false
        ]);
    }
}

