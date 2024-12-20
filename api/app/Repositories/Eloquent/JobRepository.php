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

    /*public function create(array $validateData)
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