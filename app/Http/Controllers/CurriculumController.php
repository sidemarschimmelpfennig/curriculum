<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CurriculumService;

class CurriculumController extends Controller
{
    private $curriculumService;
    public function __construct(CurriculumService $curriculumService)
    {
        $this->curriculumService = $curriculumService;
    }
    
    public function send(Request $request)
    {
        $filePath = $request->file('file')->move(public_path('uploads'), $request->file('file')->getClientOriginalName());

        return response()->json(['message' => 'Arquivo enviado com sucesso', 'path' => $filePath]);

    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
    
    public function destroy(string $id)
    {
        //
    }
}
