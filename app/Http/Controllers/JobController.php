<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{

    private $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function getAll(){
        return response()->json($this->jobService->getAll());
    }

    public function findByDepartment(string $param){
        return response()->json($this->jobService->findByDepartment($param));

    }

    public function findByCategories(string $param){
        return response()->json($this->jobService->findByDepartment($param));
    }

    public function findByStatus(string $param){
        return response()->json($this->jobService->findByStatus($param));
    }

   public function create(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|string|max:120',
            'department' => 'required|string|max:110',
            'department_categories' => 'required|string|max:100',
            'status' => 'required|string|max:20',

        ]);
        $job = $this->jobService->create($validateData);

        return response()->json($job);
   }
 
}
