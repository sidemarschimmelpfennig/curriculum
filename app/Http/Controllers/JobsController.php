<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\JobsRepository;
//use App\Repository\Interfaces\JobsInterface;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    protected JobsRepository $repository;
    public function __construct(JobsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return response()->json($this->repository->all());
        
    }

    // Teste - adicionar no interface
    public function findByDepartment(string $department)
    {
        return response()->json($this->repository->findByDepartment($department));
    }

    public function findByDepartmentCategories(string $category){
        return response()->json($this->repository->findByDepartmentCategories($category));
		
    }

    public function createJobVacancies(Request $request)
    {   
        $validator = $request->validate([
            'name' => 'required|string',
            'department' => 'required|string',
            'department_categories' => 'required|string',
            'status' => 'required|string',

        ]);

        $result = $this->repository->createJobVacancies($validator);

        return response()->json($result);
        
    }
}
