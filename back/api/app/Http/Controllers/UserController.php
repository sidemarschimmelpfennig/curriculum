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
        return $this->userService->getAll();

    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required'
            
        ]);

        return $this->userService->create($data);
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

    public function update(int $id, Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required'
        ]);

        return $this->userService->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->userService->delete($id);
        
    }
}
