<?php

namespace App\Services;

use App\Repositories\Eloquent\JobRepository;

class JobService
{
    protected $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;

    }

    public function getAll() 
    {
        return $this->repository->getAll();

    }

    public function findByDepartment(string $param)
    {
        return $this->repository->findByDepartment($param);

    }

    public function findByCategories(string $param)
    {
        return $this->repository->findByCategories($param);

    } 

    public function findByStatus(string $param)
    {
        return $this->repository->findByStatus($param);
        
    }
 
    public function getAllgetAllDepartament() { return $this->repository->getAllDepartament(); }
    public function getAllDepartament_Categories() { return $this->repository->getAllDepartament_Categories(); }
    public function getAllgetAllStatus() { return $this->repository->getAllStatus(); }

    public function createJob(array $validateData) 
    {
        $department = $this->repository->findDepartament($validateData['department_id']);
        $department_categories = $this->repository->findDepartament_Categories($validateData['department_categories_id']);
        $status = $this->repository->findStatus($validateData['status_id']);

        if(!$department)
        {
            throw new \Exception('Departamento não encontrado.');
        }
        return $this->repository->create([
            'name' => $validateData['name'],
            'department_id' => $validateData['department_id'],
            'department' => $department->departament,

            'department_categories_id' => $validateData['department_categories_id'],
            'department_categories' => $department_categories->departament_categorie,

            'status_id' => $validateData['status_id'],
            'status' => $status->status

        ]);  
        
    }

    public function update(int $id, int $newStatus){
        return $this->repository->update($id, $newStatus);

    }
}