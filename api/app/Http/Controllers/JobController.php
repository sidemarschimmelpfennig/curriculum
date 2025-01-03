<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    
};

use App\{
    Http\Controllers\Controller,
    Services\JobService,
    Services\CandidateService
};

use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    protected $jobService;
    protected $candidateService;

    public function __construct(
        JobService $jobService,
        CandidateService $candidateService
        
    )
    {
        $this->jobService = $jobService;
        $this->candidateService = $candidateService;
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
    
    public function countCandidate(int $jobID)
    {
        try {
            return response()->json($this->candidateService->countCandidate($jobID));
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
            $data = $request->validate([
                'name' => 'string',
                'description' => 'string',
                'departament_id' => 'integer',
                'departament_categories_id' => 'integer',
                'status_id' => 'integer',
                'skills_id' => 'integer',
                'mobilities_id' => 'integer',
                
            ]);
        
            $job = $this->jobService->create($data);

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
 
    public function update(int $id, Request $request)
    {
        try {
            $this->jobService->update($id, $request->all());
            $jobUpdate = $this->jobService->findID($id);

            return response()->json($jobUpdate);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Alteração negada!',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                
            ], 400);
        }

        Mail::raw('Teste de envio direto do controller.', function ($message) use ($candidate) {
            $message->to($candidate->email)
                    ->subject('Teste de E-mail');
        });
    } // <- Aleteração de status ou demais campos da vaga criada

    public function delete(int $id)
    {
        try {
            $this->jobService->delete($id);
            $job = $this->jobService->findID($id);
            return response()->json([
                'success' => true,
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

    public function findID(int $id)
    {
        try {
            $job = $this->jobService->findID($id);
            return response()->json($job);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi localizar a vaga',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ]);
        }
        
    }
}