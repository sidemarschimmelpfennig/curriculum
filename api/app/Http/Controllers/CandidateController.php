<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\CandidateService;
use App\Http\Requests\{
    CandidateRequest,
    SendRequest
    
};


class CandidateController extends Controller
{
    private $candidateService;
    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;

    }

    //public function create(CandidateRequest $request)
    public function create(Request $request)
    {
        try {
            //$validated = $request->validated();
            
            //$candidate = $this->candidateService->create($validated);
            $candidate = $this->candidateService->create($request->all());

            return response()->json([
                'message' => 'Curriculo foi cadastrado com sucesso!',
                'dados_request' => $request->all(),
                //'candidate' => $candidate
                
            ], 201);    
    
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Erro ao cadastrar currículo.',
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ], 500);
        }
    }

    public function send(SendRequest  $request) // Envio de arquivo
    {   
        try {
            $request->validated();

            $file = $request->file('file');

            $result = $this->candidateService->send($file);
            return response()->json([
                'success' => true,
                'message' => 'Arquivo enviado com sucesso!',
                'path' => $result
            
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro no envio',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
            ], 400);
        }
    }

    public function downloadFile(CandidateRequest $request)
    {
        $user = Auth::user();
        //$path = $request->
        //$directory = public_path('uploads/' . $path . '.pdf');

        //return response()->download($directory);

    }

    public function delete(int $id)
    {
        try {
            $this->candidateService->delete($id);
            $candidate = $this->candidateService->findByID($id);

            return response()->json([
                'success' => true,
                'message' => 'Candidato desativado!',
                'candidate' => $candidate
                
            ]);
                
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao desativar candidato',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
            ], 400);
        }
    }
}
