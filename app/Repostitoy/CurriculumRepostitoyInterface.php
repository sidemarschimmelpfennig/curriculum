<?php

namespace App\Repostitoy;

use Repostitoy\CurriculumRepostitoy;

interface CurriculumRepostitoyInterface
{
    public function testAPI();

    public function getAll();

    public function sendCurriculum($data);

}