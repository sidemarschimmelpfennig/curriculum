<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\JobRepositoryInterface;

use App\Models\JobVacancies;

class JobRepository implements JobRepositoryInterface
{
    public function getAll() 
    {
        return JobVacancies::all();
    }

    public function findByID(int $id)
    {
        return JobVacancies::find($id);

    }

    public function findByDepartment(string $param)
    {
        return JobVacancies::where('departament', $param)->get();
        
    }

    public function findByCategories(string $param) 
    {
        return JobVacancies::where('department_categories', $param)->get();

    }

    public function findByStatus(string $param) 
    {
        return JobVacancies::where('status', $param)->get();

    }

    public function create(array $validateData)
    {
        return JobVacancies::create($validateData);
        
    }
}