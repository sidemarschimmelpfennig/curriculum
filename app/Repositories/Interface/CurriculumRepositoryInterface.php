<?php

namespace App\Repositories\Interface;

interface CurriculumRepositoryInterface extends BaseInterface
{
    public function send(array $fileData);
    public function create(array $data);
}