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
        try {
            return response()->json($this->jobService->getAll());
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao carregar as vagas', 'th' => $th->getMessage()]);
        }
    }

    public function findByDepartment(string $param){
        try {
            return response()->json($this->jobService->findByDepartment($param));
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao carregar as vagas', 'th' => $th->getMessage()]);
        }
    }

    public function findByCategories(string $param){
        try {
            return response()->json($this->jobService->findByDepartment($param));
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao carregar as vagas', 'th' => $th->getMessage()]);
        }
    }

    public function findByStatus(string $param){
        try {
            return response()->json($this->jobService->findByStatus($param));
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao carregar as vagas', 'th' => $th->getMessage()]);
        }
    }

    public function create(Request $request) {
        try {
            $validateData = $request->validate([
                'name' => 'required|string|max:120',
                'department' => 'required|string|max:110',
                'department_categories' => 'required|string|max:100',
                'status' => 'required|string|max:20',
    
            ]);
    
            $job = $this->jobService->create($validateData);
    
            return response()->json($job);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a vaga',
                'th' => $th->getMessage()

            ]);
        }
        
    }
 
   public function update(int $id, Request $request) {
        try {
            $result = $this->jobService->update($id, $request['value']);
            return response()->json([
                'resultado' => $result,
                
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'th' => $th,
                
            ]);
        }
        
    
   }
}
