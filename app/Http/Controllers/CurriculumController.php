<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CurriculumService;
use App\Http\Middleware\LoginMiddleware;


class CurriculumController extends Controller
{
    private $curriculumService;
    public function __construct(CurriculumService $curriculumService)
    {
        $this->curriculumService = $curriculumService;

    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'full_Name' => 'required|string|max:200',
            'CPF' => 'required|string|size:10|unique:curricum_creates,CPF',
            'email' => 'required|email|unique:curricum_creates,email|max:100',
            'address' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'UF' => 'required|string|size:2',
            'City' => 'required|string|max:100',
            'CEP' => 'required|string|size:8',
            'phone' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|size:1',
            'nationality' => 'nullable|string|max:100',
            'linkedin_url' => 'nullable|url|max:255',
            'Target_Sectors' => 'required|string|max:100',
            'Target_Position' => 'required|string|max:100',
            'Target_outher' => 'nullable|string|max:100',
            'course' => 'nullable|string|max:100',
            'Institution' => 'nullable|string|max:100',
            'education_start_date' => 'nullable|date',
            'education_end_date' => 'nullable|date',
            'education_level' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:100',
            'job_description' => 'nullable|string|max:200',
            'Enterprise' => 'nullable|string|max:200',
            'Position' => 'nullable|string|max:200',
            'experience_start_date' => 'nullable|date',
            'experience_end_date' => 'nullable|date',
            'additional_info' => 'nullable|string|max:200',
            'skills' => 'nullable|string|max:100',
            'languages' => 'nullable|string|max:100',
            'salary_expectation' => 'nullable|numeric',

            'photo' => 'nullable|file|mimes:png|max:2048',
            'curriculum' => 'nullable|file|mimes:png|max:2048',
            
        ]);

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
