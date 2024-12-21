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
        //return $this->repository->apply($data);
    }

    public function archiveFile(int $id, object $file) 
    {
        return $this->repository->archiveFile($id, $file);
    }

}