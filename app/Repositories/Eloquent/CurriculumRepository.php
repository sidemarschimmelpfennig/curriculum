<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\CurriculumRepositoryInterface;

use App\Models\Curriculum;

class CurriculumRepository implements CurriculumRepositoryInterface
{
    public function create(array $data){
        return Curriculum::create($data);
        
    }

}
