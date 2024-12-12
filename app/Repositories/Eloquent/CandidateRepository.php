<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CandidateRepositoryInterface;

use App\Models\Curriculum;

class CandidateRepository implements CandidateRepositoryInterface
{
    public function create(array $data){
        return Curriculum::create($data);
        
    }

}
