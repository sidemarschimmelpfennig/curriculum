<?php

namespace App\Repository\Eloquent;

use App\Models\JobVacancies;
use App\Repository\Interfaces\JobsInterface;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

use stdClass;

class JobsRepository extends BaseRepository implements JobsInterface
{
    protected Model $model;
    public function __construct(){
        $this->model = new JobVacancies;

    }

    public function all(){
        return $this->model->all();

    }

    public function findByID(int $id)
    {
        return $this->model->findOrFail($id);

    }
	
    public function findByDepartment(string $department){
        return $this->model->where('department', $department)->get();
        
    } 

    public function findByDepartmentCategories(string $category){
        return $this->model->where('department_categories', $category)->get();
		
    }

    public function findByStatus(string $status){
        return $this->model->where('status', $status)->get();
    }

    public function createJobVacancies(array $validator)
    {   
        try {
            $vacancy = $this->model->create([
                'name' => $validator['name'],
                'department' => $validator['department'],
                'department_categories' => $validator['department_categories'],
                'status' => $validator['status'],

            ]);
            return [
                'success' => true,
                'message' => 'Vaga criada com sucesso!',
                'vacancy' => $vacancy,
            ];

        } catch (\Throwable $th) {
            //\Log::error('Erro ao criar a vaga: ' . $th->getMessage());

            return [
                'success' => false,
                'message' => 'Problemas para criar a vaga!',
                'th' => $th->getMessage()
            ];
        }
    }
}