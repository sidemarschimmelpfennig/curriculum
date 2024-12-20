<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SkillsService;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    protected $skillsService;
    public function __construct(SkillsService $skillsService)
    {
        $this->skillsService = $skillsService;

    }

    public function getAll()
    {
        try {
            return response()->json($this->skillsService->getAll());

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as skills', 
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
                'skills' => 'required|string'

            ]);

            return response()->json($this->skillsService->create($data), 201);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
            ], 400);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $data = $request->validate([
                'skills' => 'required|string'
            ]);

            return response()->json($this->skillsService->update($id, $data));
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
            ], 400);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->skillsService->delete($id);

            $skill = $this->skillsService->findBySkill($id);
            return response()->json($skill);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
                'th' => $th->getMessage(),
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
            ], 400);
        }
    }
}
