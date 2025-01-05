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
    MobilitiesService

};
class JobRepository implements JobInterface
{
    private $departamentService;
    private $departamentCategoriesService;
    private $statusService;
    private $mobilitiesService;

    public function __construct(
        DepartamentService $departamentService,
        DepartamentCategoryService $departamentCategoriesService,
        StatusService $statusService,
        MobilitiesService $mobilitiesService

    ){
        $this->departamentService = $departamentService;
        $this->departamentCategoriesService = $departamentCategoriesService;
        $this->statusService = $statusService;
        $this->mobilitiesService = $mobilitiesService;
    }

    public function getAll() 
    {
        $active = 1;
        return JobVacancies::where('active', $active)->get();
    }
    
    public function create(array $data)
    {
        $departament = $this->departamentService->findByDepartament($data['departament_id']);
        $departament_categories = $this->departamentCategoriesService->findByDepartamentCategory($data['departament_categories_id']);
        $mobilities = $this->mobilitiesService->findByMobilities($data['mobilities_id']);

        return JobVacancies::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'departament_id' => $departament->id,
            'departament' => $departament->departament,
            'departament_categories_id' => $departament_categories->id,
            'departament_categories' => $departament_categories->departament_category,
            'status_id' => 1,
            'status' => 'Pendente',
            'skills' => $data['skills'],
            'mobilities_id' => $mobilities->id,
            'mobilities' => $mobilities->mobilities
        ]);
    }

    public function update(int $id, array $data)
    {
        $departament = $this->departamentService->findByDepartament($data['departament_id']);
        $departament_categories = $this->departamentCategoriesService->findByDepartamentCategory($data['departament_categories_id']);
        $status = $this->statusService->findByStatus($data['status_id']);
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
            'skills' => $data['skills'],
            'mobilities_id' => $mobilities->id,
            'mobilities' => $mobilities->mobilities,
            'active' => 1
        ]);
    }

    public function delete(int $id)
    {
        return JobVacancies::where('id', $id)->update([
            'status' => 'Vaga Desativada',
            'active' => false
            
        ]);
    }

    public function findID(int $id)
    {
        return JobVacancies::find($id);

    }
}