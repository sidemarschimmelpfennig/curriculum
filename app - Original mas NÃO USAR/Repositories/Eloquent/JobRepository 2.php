<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\JobRepositoryInterface;

use App\Models\{
    JobVacancies, // o que importa
    Candidates, // o que importa
    CandidatesVagas, // o que importa
    Departament_Categories, // ignorar 
    Status, // ignorar
    Mobilities, // ignorar
    Skills, // ignorar

};
use App\Services\CandidateService;
use App\Services\DepartamentService;
use App\Services\DepartamentCategoryService;

class JobRepository implements JobRepositoryInterface
{
    protected $candidateSendService;
    protected $departamentService;
    protected $departamentCategoryService;

    public function __construct(
        CandidateService $candidateSendService,
        DepartamentService $departamentService,
        DepartamentCategoryService $departamentCategoryService
        
    ){
        $this->candidateSendService = $candidateSendService;
        $this->departamentService = $departamentService;
        $this->departamentCategoryService = $departamentCategoryService;
    }

    public function getAll() 
    {
        dd('Bateu no Repositorio, linha 41' . memory_get_usage() . ' bytes');

        //return JobVacancies::paginate(10)->where('active', 1)->get();
    }

    public function getAllDepartament_Categories()
    { 
        return Departament_Categories::paginate(10); 

    }
    public function findDepartament_Categories(string $id)
    { 
        //return Departament_Categories::find($id); 

    }

    public function getAllStatus()
    { 
        //return Status::paginate(10); 
    }

    public function findStatus(string $id)
    {
        //return Status::find($id); 
    }

    public function findSkills(int $id)
    { 
        //return Skills::find($id); 

    }

    public function findMobilities (int $id)
    { 
        //return Mobilities::find($id); 

    }

    public function findByCategories(string $param) 
    {
        //return JobVacancies::where('department_categories', $param)->first();

    }

    public function findByStatus(string $param) 
    {
        //return JobVacancies::where('status', $param)->first();

    }

    public function findBySkills(string $param) 
    {
        //return Skills::where('skills', $param)->first();

    }

    public function findByMobilities(string $param)
    {
        //return Mobilities::where('mobilities', $param)->first();
    }

    public function create(array $validateData)
    {
        /*$departament = $this->departamentService->findByDepartament($validateData['departament_id']);
        $departament_categories = $this->departamentCategoryService->findByDepartamentCategory($validateData['departament_categories_id']);

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

        ]);*/
        
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
    

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {
        
    }
}