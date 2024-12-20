<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\Auth
    
};

use App\{
    Http\Controllers\Controller,
    Services\JobService

};
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    private $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function getAll()
    {
        try {
            $jobs = $this->jobService->getAll();
            
            return response()->json([
                'message' => 'Todas as vagas',
                'jobs' => $jobs
            ]);

            Log::info('Memória usada: '. memory_get_usage(true));

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
            ], 400);
        }
    }

    public function create(Request $request)
    //public function create(JobRequest $request) // <- Se não houver um campo necessário, vai retornar 404
    { 
        try {
            $validatedData = $request->validate([
                'name' => 'string',
                'description' => 'string',
                'departament_id' => 'integer',
                'departament_categories_id' => 'integer',
                'status_id' => 'integer',
                'skills_id' => 'integer',
                'mobilities_id' => 'integer',
            ]);

            $job = $this->jobService->create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Vaga criada com sucesso!',
                'request' => $request->all(),
                'vagas' => $job,
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                
            ], 400);
        }
        
    }
 
    public function updateStatus(int $id, Request $request)
    {
        try {
            $result = $this->jobService->updateStatus($id, $request['value']);
            return response()->json([
                'message' => 'Alteração realizada com sucesso!',
                'resultado' => $result,
                
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Alteração negada!',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                
            ], 400);
        }
    } // <- Aleteração de status ou demais campos da vaga criada

    public function delete(int $id)
    {
        try {
            $this->jobService->delete($id);
            $job = $this->jobService->findID($id);
            return response()->json([
                'message' => 'Vaga desativada com sucesso',
                'job' => $job

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível desativar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ]);
        }
    }

    
}