<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CandidateRepositoryInterface;

use App\Models\Candidates;

class CandidateRepository implements CandidateRepositoryInterface
{
    public function create(array $data){
        return Candidates::create($data);
        
    }

}
