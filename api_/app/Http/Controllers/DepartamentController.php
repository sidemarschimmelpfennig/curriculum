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
            $departaments = $this->departamentService->getAll();
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
            $validate = $request->validate([
                'departament' => 'required|string'
                
            ]);
    
            return response()->json($this->departamentService->create($validate));

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro',
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'th' => $th->getMessage()

            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        
    }

    public function delete(int $id)
    {
        
    }
}
