<?php

namespace App\Http\Controllers;

use App\Repositories\Interface\CurriculumRepositoryInterface;
use Illuminate\Http\Request;
use App\Services\CurriculumService;

class CurriculumController extends Controller
{
    private $curriculumService;
    public function __construct(CurriculumService $curriculumService)
    {
        $this->curriculumService = $curriculumService;
    }
    
    public function all()
    {
        return response()->json($this->curriculumService->all());
    }

    public function findByID(int $id)
    {
        $curriculum = $this->curriculumService->findById($id);

        if (!$curriculum) {
            return response()->json(['error' => 'Currículo não encontrado!'], 404);
        }

        return response()->json($curriculum);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Full_Name' => 'required|string|max:200',
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
            'photo' => 'nullable|string|max:255',
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
        ]);

        try {
            $newCurriculum = $this->curriculumService->create($validatedData);

            return response()->json(['message' => 'Currículo criado com sucesso!', 'data' => $newCurriculum]);
        } catch (\Exeption $e) {
            return response()->json(['error' => 'Falha ao criar o currículo!', 'details' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:curriculums,email,' . $id,
        ]);

        $updatedCurriculum = $this->curriculumService->update($id, $data);

        if (!$updatedCurriculum) {
            return response()->json(['error' => 'Currículo não encontrado para atualização!'], 404);
        }

        return response()->json($updatedCurriculum);
    }

    public function send(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try{
            $filePath = $request->file('file')->move(public_path('uploads'), $request->file('file')->getClientOriginalName());

            return response()->json(['message' => 'Arquivo enviado com sucesso', 'path' => $filePath]);

        } catch (\Exeption $e){
            return response()->json(['error' => 'Falha ao enviar o arquivo!', 'details' => $e->getMessage()], 500);
        }
    }
    
    public function destroy(string $id)
    {
        try {
            $this->curriculumService->delete($id);
            return response()->json(['message' => 'Currículo deletado com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Falha ao deletar o currículo!', 'details' => $e->getMessage()], 400);
        }
    }
}
