<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;

use App\Http\Requests\AdminRequest;

class AdminController extends Controller
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

    public function create(AdminRequest $request)
    {
        $validated = $request->validated();

        $user = $this->userService->create($validated);
        return response()->json([
            'message' => 'Erro ao criar usuário!',
            'user' => $user,
        ], 400);
        
    }
}
