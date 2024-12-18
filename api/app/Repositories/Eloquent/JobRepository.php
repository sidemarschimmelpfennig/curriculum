<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\JobRepositoryInterface;

use App\Models\{
    JobVacancies, // o que importa
    Candidates, // o que importa
    CandidatesVagas, // o que importa
    Departament, // ignorar
    Departament_Categories, // ignorar 
    Status, // ignorar
    Mobilities, // ignorar
    Skills, // ignorar
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

    public function getAllDepartament()
    { 
        return Departament::all(); 
    }
    public function findDepartament(string $id)
    {
        return Departament::find($id); 
    }

    public function getAllDepartament_Categories()
    { 
        return Departament_Categories::all(); 

    }
    public function findDepartament_Categories(string $id)
    { 
        return Departament_Categories::find($id); 

    }

    public function getAllStatus()
    { 
        return Status::all(); 
    }

    public function findStatus(string $id)
    {
        return Status::find($id); 
    }

    public function findSkills(int $id)
    { 
        return Skills::find($id); 

    }

    public function findMobilities (int $id)
    { 
        return Mobilities::find($id); 

    }

    public function findByDepartament(string $param)
    {
        return JobVacancies::where('departament', $param)->first();
        
    }

    public function findByCategories(string $param) 
    {
        return JobVacancies::where('department_categories', $param)->first();

    }

    public function findByStatus(string $param) 
    {
        return JobVacancies::where('status', $param)->first();

    }

    public function findBySkills(string $param) 
    {
        return Skills::where('skills', $param)->first();

    }

    public function findByMobilities(string $param)
    {
        return Mobilities::where('mobilities', $param)->first();
    }

    public function create(array $validateData)
    {
        //return JobVacancies::create($validateData);
        $departament = $this->findDepartament($validateData['departament_id']);
        $departament_categories = $this->findDepartament_Categories($validateData['departament_categories_id']);
        $status = $this->findStatus($validateData['status_id']);
        $skills = $this->findSkills($validateData['skills_id']);
        $mobilities = $this->findMobilities($validateData['mobilities_id']);   

        return JobVacancies::create([
            'name' => $validateData['name'],
            'description' => $validateData['description'],

            'departament_id' => $validateData['departament_id'],
            'departament' => $departament->departament,

            'departament_categories_id' => $validateData['departament_categories_id'],
            'departament_categories' => $departament_categories->departament_categorie,

            'skills_id' => $validateData['skills_id'],
            'skills' => $skills->skills,

            'mobilities_id' => $validateData['mobilities_id'],
            'mobilities' => $mobilities->mobilities,

            'status_id' => $validateData['status_id'],
            'status' => $status->status

        ]);
        
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

    public function createSkills(array $data)
    {
        return Skills::create($data);
    } 
    
    public function createMobilities(array $data)
    {
        return Mobilities::create($data);
        
    }

    public function updateStatus(int $id, int $newStatus)
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
        $job = JobVacancies::where('id', $job_id)->first();
        $user = Candidates::where('id', $userID)->first();
        $file = $this->candidateSendService->send($file);

        return CandidatesVagas::create([
            'job_id' => $job_id,
            'job' => $job->name,
            'candidate_id' => $userID,
            'full_name' => $user->full_name,
            'file' => $file 
            
        ]);

    }

    public function deleteDepartament(int $id)
    {
        return Departament::where('id', $id)->update([
            'active' => false

        ]);
        
    }

    public function delete(int $id)
    {
        
    }
}