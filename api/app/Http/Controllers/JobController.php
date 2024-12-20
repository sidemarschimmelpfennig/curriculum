<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    
};

use App\{
    Http\Controllers\Controller,
    Services\JobService

};
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function getAll()
    {
        try {    
            return response()->json($this->jobService->getAll());
        
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
           
            //$validatedData = $request->validated();

            //$job = $this->jobService->createJob($request->all());
            $job = $this->jobService->createJob($validatedData);

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
                'th' => $th,
                
            ], 400);
        }
    } // <- Aleteração de status ou demais campos da vaga criada

    public function apply(Request $request)
    {
        dump('Linha 125');
    }

}