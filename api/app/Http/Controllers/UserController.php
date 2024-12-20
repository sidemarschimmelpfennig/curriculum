<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }
    public function getAll()
    {
        return response()->json($this->userService->getAll());

    }

    public function findByID(int $id)
    {
        $user = $this->userService->findByID($id);
        if (!empty($user)) {
            return response()->json($user);
            
        } else {
            return response()->json('Usuário não encontrado!');

        }
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
            
        ]);

        $user = $this->userService->create($data);
        return response()->json([
            'message' => 'Erro ao criar usuário!',
            'user' => $user,
        ], 400);
        
    }

    public function delete(int $id)
    {
        try {
            $this->userService->delete($id);
            $admin = $this->userService->findByID($id);
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
