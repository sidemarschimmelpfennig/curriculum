<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\StatusService;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }
    public function getAll()
    {
        try {
            return response()->json($this->statusService->getAll());

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao carregar as vagas', 
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
                'status' => 'required|string'
            ]);
        
            return response()->json([
                'message' => 'Status cadastrado com sucesso!',
                'status' => $this->statusService->create($data)

            ]);

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
                'status' => 'required|string'
            ]);
            
            $status = $this->statusService->update($id, $data);

            return response()->json([
                'message' => 'Status alterado com sucesso!',
                'status' => $status

            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao alterar as status', 
                'th' => $th->getMessage(),
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
            ], 400);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        try {
            $this->statusService->delete($id);
            
            $status = $this->statusService->findByStatus($id);

            return response()->json([
                'message' => 'Status desativado com sucesso!',
                'status' => $status

            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao alterar o status', 
                'th' => $th->getMessage(),
                'th' => $th->getMessage(),
                'file' => $th->getFile(),
            ], 400);
            
        }
    }
}
