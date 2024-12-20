<?php

namespace App\Repositories\Eloquent;

use App\Models\JobVacancies;
use App\Repositories\Interface\JobRepositoryInterface;

class JobRepository implements JobRepositoryInterface
{
    public function getAll() 
    {
        dump('Memória usada para a consulta: ' . memory_get_usage(true));
        return JobVacancies::all();
    }

    public function create(array $data)
    {
        return JobVacancies::create($data);
        
    }

    public function update(int $id, array $data)
    {
        return JobVacancies::where('id', $id)->update($data);

    }

    public function updateStatus(int $id, int $newStatus)
    {
        dump('Memória usada para o updateStatus: ' . memory_get_usage(true));
        $job = JobVacancies::where('id', $id)->first();        
        if ($job){
            if ($newStatus == 1) {
                return $job->update(['status' => 'Em análise']);

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

    public function findID(int $id)
    {
        dump('Memória usada para o findID: ' . memory_get_usage(true));
        return JobVacancies::find($id);

    }
    
    public function delete(int $id)
    {
        dump('Memória usada para o delete: ' . memory_get_usage(true));
        return JobVacancies::where('id', $id)->update([
            'active' => false

        ]);
    }
    
}