<?php

namespace App\Repostitoy;

use App\Models\Curriculum;

class CurriculumRepostitoy implements CurriculumRepostitoyInterface
{

    public function testAPI() {
        return 'API on';
    }

    public function getAll(){
        return Curriculum::all();

    }

    public function sendCurriculum($data){
        return Curriculum::create($data);

    }
}