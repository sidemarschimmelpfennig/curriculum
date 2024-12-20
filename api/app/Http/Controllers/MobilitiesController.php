<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\MobilitiesService;
use Illuminate\Http\Request;

class MobilitiesController extends Controller
{
    protected $mobilitiesService;

    public function __construct(MobilitiesService $mobilitiesService)
    {
        $this->mobilitiesService = $mobilitiesService;
    }

    public function getAll()
    {
        try {    
            return response()->json($this->mobilitiesService->getAll());
        
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as mobilidades', 
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
                'mobilities' => 'required|string',
            ]);
        
            return response()->json($this->mobilitiesService->create($data), 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível criar a mobilidades',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                
            ], 400);
        }
    }
    
    public function update(Request $request, int $id)
    {
        try {
            $data = $request->validate([
                'mobilities' => 'required|string',
            ]);
        
            return response()->json($this->mobilitiesService->update($id, $data), 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível alterar a mobilidades',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                
            ], 400);
        }
    }

    public function delete(int $id)
    {
        try {
            $this->mobilitiesService->delete($id);

            return response()->json($this->mobilitiesService->findByMobilities($id));
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível alterar a mobilidades',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                
            ], 400);
        }
    }
}
