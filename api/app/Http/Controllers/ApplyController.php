<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ApplyService;

use Illuminate\Http\Request;

class ApplyController extends Controller
{
    protected $applyService;

    public function __construct(ApplyService $applyService)
    { $this->applyService = $applyService; }

    public function apply(Request $request)
    {
        try {
            $data = $request->validate([
                'job_id' => 'required|integer',
                'candidate_id' => 'required|integer',
                'curriculum' => 'required|file|mimes:pdf,doc,docx'
    
            ]);

            $apply = $this->applyService->apply($data);
    
            return response()->json([
                'message' => 'Candidato aplicado a vaga com sucesso',
                'apply' => $apply
                
            ]);
    
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ], 400);
        }

    }

        
    public function downloadFile(Request $request)
    {
        //$path = $request->
        //$directory = public_path('uploads/' . $path . '.pdf');

        //return response()->download($directory);

    }

}