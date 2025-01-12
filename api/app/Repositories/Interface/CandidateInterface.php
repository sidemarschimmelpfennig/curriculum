<?php

namespace App\Repositories\Interface;

interface CandidateInterface extends BaseInterface
{
    public function getAll();
    public function countCandidate(int $jobID);
    public function apply(int $id, int $jobID);
    public function findByJob(int $id);
    public function findByEmail(string $param);
}