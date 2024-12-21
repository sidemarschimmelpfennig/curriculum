<?php

namespace App\Repositories\Interface;

interface CandidateInterface extends BaseInterface
{
    public function applyCreate(int $id, object $file, int $jobID);

}