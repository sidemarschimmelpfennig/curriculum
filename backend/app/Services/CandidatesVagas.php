<?php

namespace App\Services;

use App\Repositories\Eloquent\CandidatesVagasRepository;

class CandidatesVagas
{
    protected $repository;

    public function __construct( $repository)
    {
        $this->repository = $repository;

    }

    public function getAll() 
    {
        return $this->repository->getAll();

    }
}