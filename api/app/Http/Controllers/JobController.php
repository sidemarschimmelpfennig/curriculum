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
       return $this->jobService->getAll();
    }
    
    public function create(Request $request)
    {     
        $data = $request->validate([
            'name' => 'string',
            'description' => 'string',
            'departament_id' => 'integer',
            'departament_categories_id' => 'integer',
            'status_id' => 'integer',
            'skills_id' => 'integer',
            'mobilities_id' => 'integer',
            
        ]);
        return $this->jobService->create($data);
    }
 
    public function update(int $id, Request $request)
    {
        $data = $request->validate([
            'name' => 'string',
            'description' => 'string',
            'departament_id' => 'integer',
            'departament_categories_id' => 'integer',
            'status_id' => 'integer',
            'skills_id' => 'integer',
            'mobilities_id' => 'integer',
            
        ]);
        
        return $this->jobService->update($id, $data);

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


    public function countCandidate(int $jobID)
    {
        return response()->json($this->candidateService->countCandidate($jobID));
        
    }
}