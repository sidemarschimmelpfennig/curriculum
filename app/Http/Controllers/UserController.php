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
            
        }
        return response()->json('nada aqui');

    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'is_admin' => 'required|boolean'

        ]);

        $user = $this->userService->create($validateData);
        return response()->json($user);
        
        
        

    }
}
