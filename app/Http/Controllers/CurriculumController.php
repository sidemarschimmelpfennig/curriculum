<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CurriculumService;
use Illuminate\Support\Facades\Hash;

class CurriculumController extends Controller
{
    private $curriculumService;
    public function __construct(CurriculumService $curriculumService)
    {
        $this->curriculumService = $curriculumService;

    }

    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'full_name' => 'required|string|max:200',
                'cpf' => 'required|string',
                'address' => 'required|string|max:100',
                'district' => 'required|string|max:100',
                'uf' => 'required|string|size:2',
                'city' => 'required|string|max:100',
                'cep' => 'required|string',
                'phone' => 'required|string|max:100',
                'date_of_birth' => 'required|date',
                'gender' => 'required|string|size:1',
                'nationality' => 'nullable|string|max:100',
                'linkedin_url' => 'nullable|url|max:255',
                'target_sectors' => 'required|string|max:100',
                'target_position' => 'required|string|max:100',
                'target_outher' => 'nullable|string|max:100',
                'course' => 'nullable|string|max:100',
                'institution' => 'nullable|string|max:100',
                'education_start_date' => 'nullable|date|before_or_equal:education_end_date',
                'education_end_date' => 'nullable|date|after_or_equal:education_start_date',
                'education_level' => 'nullable|string|max:100',
                'company' => 'nullable|string|max:100',
                'job_description' => 'nullable|string|max:200',
                'enterprise' => 'nullable|string|max:200',
                'position' => 'nullable|string|max:200',
                'experience_start_date' => 'nullable|date|before_or_equal:experience_end_date',
                'experience_end_date' => 'nullable|date|after_or_equal:experience_start_date',
                'additional_info' => 'nullable|string|max:200',
                'skills' => 'nullable|string|max:100',
                'languages' => 'nullable|string|max:100',
                'salary_expectation' => 'nullable|numeric',
            
                // Arquivos (opcionais)
                //'photo' => 'file|mimes:png,jpeg|max:2048',
                //'curriculum' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
                'email' => 'required|email|max:100',
                'password' => 'required|string|min:8|max:100'
            ]);
            
            $candidate = $this->curriculumService->create($data);

            return response()->json([
                'dados_request' => $request->all(),
                'candidate' => $candidate
                
            ]);    
    
        } catch (\Throwable $th) {
            return response()->json([
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile()
                
            ]);
        }
        
    }

    public function send(Request $request)
    {
        
        try {
            $file = $request->validate([
                'file' => 'required|file|mimes:pdf|max:2048'
            ]);

            $file = $request->file('file');

            $result = $this->curriculumService->send($file);
            return response()->json([
                'type' => gettype($file),
                'result' => $result
            
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro no envio',
                'th' => $th->getMessage()
            ]);
        }

    }
}
