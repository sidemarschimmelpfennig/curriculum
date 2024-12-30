<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CandidateService;

class CandidateController extends Controller
{
    protected $candidateService;
    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;

    }

    public function delete(int $id)
    {
        try {
            $this->candidateService->delete($id);
            $candidate = $this->candidateService->findByID($id);

            return response()->json($candidate);
                
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao desativar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
            ], 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'full_name' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string',
                'phone' => 'required|string',
                'additional_info' => 'required|string',
                'curriculum' => 'required|file',

            ]);
            
            $candidate = $this->candidateService->create($data);
            
            return response()->json([
                'success' => true,
                'candidate' => $candidate
            
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao criar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
                'code' => $th->getCode(),
                'request' => $request->all()

            ], 400);   
        }

    }

    public function updateStatus(Request $request, int $candidateID)
    {
        try {
            $status = $request->input('status_');
            $a = $this->candidateService->updateStatus($candidateID, $status);
            
            $candidate = $this->candidateService->findByID($candidateID);
            return response()->json([
                'status' => $status,
                'id' => $candidateID,
                'candidate' => $candidate,
                'a' => $a
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao alterar status do candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }
        
    }

    public function findbyID(int $id)
    {        
        return response()->json($this->candidateService->findByID($id));

    }

    public function findByJob(int $id)
    {
        try {
            $candidate = $this->candidateService->findByJob($id);
            if($candidate)
            {
                return response()->json($candidate);

            } else {
                return response()->json('Não tem candidatos aplicados para essa vaga');
            }
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao criar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }
    }

    public function apply(Request $request)
    {
        try {
            $data = $request->validate([
                'jobID' => 'required|integer',
                'candidateID' => 'required|string'

            ]);

            return response()->json([
                'success' => true,
                'dados' => $data,
                
            ]);

            /*$apply = $this->candidateService->apply($data['jobID'], $data['candidateID']);

            return response()->json([
                'success' => true,
                'dados' => $data,
                'Aplicação' => $apply

            ]);*/
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao criar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ], 400);
        }

    }

    public function downloadFile(int $id)
    {
        $directory = $this->candidateService->downloadFile($id);
        if($directory)
        {
            try {
                return response()->download($directory); 
            } catch (\Throwable $th) {
                return response()->json([
                    'erro' => 'Erro ao criar candidato',
                    'th' => $th->getMessage(),
                    'line' => $th->getLine(),
                    'file' => $th->getfile(),

                ], 400);
            }
         
        } else {
            return response()->json([
                'erro' => 'Erro, arquivo não encontrado',

            ]);
        }
            
    }
}
