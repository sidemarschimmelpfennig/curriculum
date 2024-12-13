<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\JobRepositoryInterface;

use App\Models\{
    JobVacancies, // o que importa
    Departament, // ignorar
    Departament_Categories, // ignorar 
    Status, // ignorar
    CandidatesVagas, // o que importa
    Candidates, // o que importa

};
use App\Services\CandidateService;

class JobRepository implements JobRepositoryInterface
{
    protected $candidateSendService;

    public function __construct(CandidateService $candidateSendService)
    {
        $this->candidateSendService = $candidateSendService;
    }

    public function getAll() 
    {
        return JobVacancies::all();
    }

    public function getAllDepartament(){ return Departament::all(); }
    public function findDepartament(string $id){ return Departament::find($id); }

    public function getAllDepartament_Categories() { return Departament_Categories::all(); }
    public function findDepartament_Categories(string $id) { return Departament_Categories::find($id); }

    public function getAllStatus(){ return Status::all(); }
    public function findStatus(string $id){ return Status::find($id); }

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

    public function createDepartament(array $validateData)
    {
        return Departament::create($validateData);
        
    }

    public function createDepartamentCategory(array $validateData)
    {
        return Departament_Categories::create($validateData);
        
    }
    public function createStatus(array $validateData)
    {
        return Status::create($validateData);
        
    }

    public function update(int $id, int $newStatus)
    {
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

    public function apply(int $userID, int $job_id, object $file)
    {
        $job = JobVacancies::where('id', $job_id)->get();
        $user = Candidates::where('id', $userID)->get();
        $file = $this->candidateSendService->send($file);

        return CandidatesVagas::create([
            'job_id' => $job_id,
            'job' => $job[0]->name,
            'candidate_id' => $userID,
            'full_name' => $user[0]->full_name,
            'file' => $file
            
        ]);

    }
}