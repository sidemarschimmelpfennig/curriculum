<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AdminService;

use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;

    }
    public function getAll()
    {
        return response()->json($this->adminService->getAll());

    }

    public function findByID(int $id)
    {
        $user = $this->adminService->findByID($id);
        if (!empty($user)) {
            return response()->json($user);
            
        } else {
            return response()->json('Usuário não encontrado!');

        }
    }

    public function create(AdminRequest $request)
    {
        $validated = $request->validated();

        $user = $this->adminService->create($validated);
        return response()->json([
            'message' => 'Erro ao criar usuário!',
            'user' => $user,
        ], 400);
        
    }

    public function delete(int $id)
    {
        try {
            $this->adminService->delete($id);
            $admin = $this->adminService->findByID($id);
            return response()->json([
                'success' => true,
                'message' => 'user desativado com sucesso',
                'adim' => $admin

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao desativar usuário',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
            ], 400);
        }
        
    }
}
