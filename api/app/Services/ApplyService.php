<?php

namespace App\Services;

use App\Repositories\Eloquent\ApplyRepository;

class ApplyService
{
    protected $repository;

    public function __construct(ApplyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function apply(array $data)
    {
        return $this->repository->apply($data);
    }

}