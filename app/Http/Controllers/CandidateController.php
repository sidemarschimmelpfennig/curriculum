<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CandidateService;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    private $candidateService;
    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;

    }

    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'full_name' => 'required|string|max:200',
                'email' => 'required|email|max:100',
                'contactphone' => 'required|string|max:100',
                'additional_info' => 'required|string|max:200',
                'ability' => 'required|string|max:100',
                'file' => 'required|file|mimes:pdf'
                
            ]);
            
            $candidate = $this->candidateService->create($data);

            return response()->json([
                'message' => 'Curriculo foi cadastrado com sucesso!',
                'dados_request' => $request->all(),
                'candidate' => $candidate
                
            ], 201);    
    
        } catch (\Throwable $th) {
            return response()->json([
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile()
                
            ]);
        }
        
    }

    public function send(Request $request) // Envio de arquivo
    {   
        try {
            $request->validate([
                'file' => 'required|file|mimes:pdf,doc,docx|max:2048'
            ]);

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
                'th' => $th->getMessage()
            ]);
        }
    }

    public function downloadFile(Request $request)
    {
        $user = Auth::id();
        //$path = $request->
        $directory = public_path('uploads/' . $path . '.pdf');

        return response()->download($directory);

    }
}
