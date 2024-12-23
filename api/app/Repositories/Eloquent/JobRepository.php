<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\JobInterface;

use App\Models\{
    JobVacancies,

};

use App\Services\{
    DepartamentService,
    DepartamentCategoryService,
    StatusService,
    SkillsService,
    MobilitiesService
};
class JobRepository implements JobInterface
{
    private $departamentService;
    private $departamentCategoriesService;
    private $statusService;
    private $skillsService;
    private $mobilitiesService;

    public function __construct(
        DepartamentService $departamentService,
        DepartamentCategoryService $departamentCategoriesService,
        StatusService $statusService,
        SkillsService $skillsService,
        MobilitiesService $mobilitiesService
    ){
        $this->departamentService = $departamentService;
        $this->departamentCategoriesService = $departamentCategoriesService;
        $this->statusService = $statusService;
        $this->skillsService = $skillsService;
        $this->mobilitiesService = $mobilitiesService;
    }

    public function getAll() 
    {
        return JobVacancies::all()/*->where('active', 1) */;
    }
    
    public function create(array $data)
    {
        $departament = $this->departamentService->findByDepartament($data['departament_id']);
        $departament_categories = $this->departamentCategoriesService->findByDepartamentCategory($data['departament_categories_id']);
        $status = $this->statusService->findByStatus($data['status_id']);
        $skills = $this->skillsService->findBySkill($data['skills_id']);
        $mobilities = $this->mobilitiesService->findByMobilities($data['mobilities_id']);

        return JobVacancies::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'departament_id' => $departament->id,
            'departament' => $departament->departament,
            'departament_categories_id' => $departament_categories->id,
            'departament_categories' => $departament_categories->departament_category,
            'status_id' => $status->id,
            'status' => $status->status,
            'skills_id' => $skills->id,
            'skills' => $skills->skills,
            'mobilities_id' => $mobilities->id,
            'mobilities' => $mobilities->mobilities
        ]);
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
        $departament = $this->departamentService->findByDepartament($data['departament_id']);
        $departament_categories = $this->departamentCategoriesService->findByDepartamentCategory($data['departament_categories_id']);
        $status = $this->statusService->findByStatus($data['status_id']);
        $skills = $this->skillsService->findBySkill($data['skills_id']);
        $mobilities = $this->mobilitiesService->findByMobilities($data['mobilities_id']);

        return JobVacancies::where('id', $id)->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'departament_id' => $departament->id,
            'departament' => $departament->departament,
            'departament_categories_id' => $departament_categories->id,
            'departament_categories' => $departament_categories->departament_category,
            'status_id' => $status->id,
            'status' => $status->status,
            'skills_id' => $skills->id,
            'skills' => $skills->skills,
            'mobilities_id' => $mobilities->id,
            'mobilities' => $mobilities->mobilities
        ]);
    }

    public function delete(int $id)
    {
        return JobVacancies::where('id', $id)->update([
            'active' => false 
            
        ]);
    }

    public function findID(int $id)
    {
        return JobVacancies::find($id);

    }
}