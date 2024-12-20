<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\JobInterface;

use App\Models\{
    JobVacancies,

};

use App\Services\{
    DepartamentService,
    DepartamentCategoryService
};
class JobRepository implements JobInterface
{
    private $departamentService;
    private $departamentCategoriesService;

    public function __construct(
        DepartamentService $departamentService,
        DepartamentCategoryService $departamentCategoriesService
    ){
        $this->departamentService = $departamentService;
        $this->departamentCategoriesService = $departamentCategoriesService;
    }

    public function getAll() 
    {
        return JobVacancies::all()/*->where('active', 1) */;
    }

<<<<<<< HEAD
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

    public function findByCategories(string $param) 
    {
        return JobVacancies::where('department_categories', $param)->first();

    }

    public function findByStatus(int $id) 
    {
        return Status::where('id', $id)->first();

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
=======
    /*public function create(array $validateData)
>>>>>>> kochem
    {
        $departament = $this->departamentService->findByDepartament($validateData['departament_id']);
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

        ]);
        
    }*/

    public function create(array $data)
    {
        $departament = $this->departamentService->findByDepartament($data['departament_id']);
        $departament_categories = $this->departamentCategoriesService->findByDepartamentCategory($data['departament_categories_id']);

        return [
            $departament,
            $departament_categories,

        ];
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