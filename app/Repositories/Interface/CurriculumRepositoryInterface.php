<?php

namespace App\Repositories\Interface;

interface CurriculumRepositoryInterface extends BaseInterface
{
    public function send(object $file, array $request);

}