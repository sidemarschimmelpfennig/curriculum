<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CandidatesVagasInterface;

use App\Models\{
    JobVacancies,
    Departament,
    Departament_Categories,
    Status,
    Candidates_vagas
    
};

class CandidatesVagasRepository implements CandidatesVagasInterface
{
    public function getAll() 
    {
        return Candidates_vagas::all();
    }
}