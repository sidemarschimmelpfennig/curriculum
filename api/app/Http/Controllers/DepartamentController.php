<?php

namespace App\Http\Controllers;

use App\Services\DepartamentService;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    protected $departamentService;
    public function __construct(DepartamentService $departamentService)
    {
        $this->departamentService = $departamentService;

    }

    public function getAll()
    {
        try {        
            return response()->json($this->departamentService->getAll());

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro',
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'th' => $th->getMessage()

            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function crate(Request $request)
    {
        try {
            $data = $request->validate([
                'departament' => 'required|string'
                
            ]);
    
            return response()->json([
                'message' => 'Departamento criado com sucesso!',
                'departament' => $this->departamentService->create($data)
            
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao criar o departamento',
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'th' => $th->getMessage()

            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $data = $request->validate([
                'departament' => 'required|string'
            ]);
            
            $departament = $this->departamentService->update($id, $data);

            return response()->json([
                'message' => 'Departamento alterado com sucesso!',
                'departament' => $departament

            ]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function delete(int $id)
    {
        try {
            $this->departamentService->delete($id);
            
            $departament = $this->departamentService->findByDepartament($id);

            return response()->json([
                'message' => 'Departamento desativado com sucesso!',
                'departament' => $departament

            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao alterar o departamento', 
                'th' => $th->getMessage(),
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
            ], 400);
            
        }
    }
}
