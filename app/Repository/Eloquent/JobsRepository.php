<?php

namespace App\Repository\Eloquent;

use App\Models\JobVacancies;
use App\Repository\Interfaces\BaseInterface;

use Illuminate\Database\Eloquent\Model;

class JobsRepository extends BaseRepository implements BaseInterface
{

    protected Model $model;
    public function __construct(){
        $this->model = new JobVacancies;

    }

    public function all(){
        return $this->model->all();

    }

    public function findByID(int $id)
    {
        return $this->model->find($id);
        
    }

}