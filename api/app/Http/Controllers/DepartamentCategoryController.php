<?php

namespace App\Http\Controllers;

use App\Services\DepartamentCategoryService;
use Illuminate\Http\Request;

class DepartamentCategoryController extends Controller
{
    protected $departamentCategoryService;
    public function __construct(DepartamentCategoryService $departamentCategoryService)
    {
        $this->departamentCategoryService = $departamentCategoryService;

    }

    public function getAll()
    {
        try {
            $departaments = $this->departamentCategoryService->getAll();
            if(count($departaments) <= 0)
            {   
                return response()->json('Sem departamentos encontrados');

            }
            
            return response()->json([
                'message' => 'Departamentos',
                'departaments' => $departaments

            ]);

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
                'departament_category' => 'required|string'
                
            ]);
    
            return response()->json([
                'message' => 'Departamento criado com sucesso!',
                'departament' => $this->departamentCategoryService->create($data)
            
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
            
            $departament = $this->departamentCategoryService->update($id, $data);

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
            $this->departamentCategoryService->delete($id);
            
            $departament = $this->departamentCategoryService->findByDepartamentCategory($id);

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
