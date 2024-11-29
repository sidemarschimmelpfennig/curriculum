<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Repository\Eloquent\JobsRepository;
use App\Repository\Interfaces\JobsInterface;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    protected JobsInterface $repository;
    public function __construct(JobsInterface $repository)
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
        $data = $request->all();
        $result = $this->repository->createJobVacancies($data);
        return response()->json($result);
        
    }
}
