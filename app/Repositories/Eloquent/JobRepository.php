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

    public function update(int $id, int $newStatus){
        $job = JobVacancies::where('id', $id)->first();        
        if ($job){
            if ($newStatus == 1) {
                return $job->update(['status' => 'Em analise']);

            } else if ($newStatus == 2) {
                return $job->update(['status' => 'Andamento']);

            } else if ($newStatus == 3) {
                return $job->update(['status' => 'Encerrada']);
            
            }
            return $job->save();
        } else {
            return [
                'Não foi encontrado nem uma vaga de trabalho'
            ];
        }
    
    }
}