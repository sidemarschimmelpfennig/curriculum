<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\JobRepositoryInterface;
use App\Models\JobVacancies;
use Illuminate\Database\Eloquent\Model;

class JobRepository implements JobRepositoryInterface
{
    protected Model $model;
    public function __construct(){
        $this->model = new JobVacancies;

    }

    public function getAll() {
        return $this->model->all();

    }

    public function findByID(int $id){
        return $this->model->find($id);
    }

    public function findByDepartment(string $param){
        return $this->model->where('departament', $id)->get();
    }
}