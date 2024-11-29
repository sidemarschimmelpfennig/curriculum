<?php

namespace App\Repository\Eloquent;

use App\Models\JobVacancies;
use App\Repository\Interfaces\JobsInterface;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

use stdClass;

class JobsRepository implements JobsInterface
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
        return $this->model->find($id);

    }
	
    public function findByDepartment(string $department) : stdClass|null {
        return $this->model->where('department', $department)->get();
		
    } 

    public function findByDepartmentCategories(string $category) : stdClass|null {
        return $this->model->where('department_categories', $category)->get();
		
    }

    public function createJobVacancies(array $data)
    {   

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'department' => 'required|string',
            'department_categories' => 'required|string',
            'status' => 'required|string',

        ]);

        if($validator->fails()){
            return [
                'message' => 'Error ao criar a vaga de trabalho',
                'erro' => $validator->errors()->all(),
                'validator' => $validator,

            ];
        }

        try {
            $vacancy = $this->model->create([
                'name' => $data['name'],
                'department' => $data['department'],
                'department_categories' => $data['department_categories'],
                'status' => $data['name'],

            ]);
            return [
                'success' => true,
                'message' => 'Vaga criada com sucesso!',
                'vacancy' => $vacancy,
            ];

        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => 'Problemas para criar a vaga!',
                'th' => $th->getMessage(),
            ];
        }
    }
}