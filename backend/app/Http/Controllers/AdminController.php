<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\{
    UserService,
    JobService

};

class AdminController extends Controller
{
    protected $userService;
    protected $jobService;

    public function __construct(UserService $userService, JobService $jobService)
    {
        $this->userService = $userService;
        $this->jobService = $jobService;

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
            return response()->json([
                'message' => 'Usuario não encontrado!'

            ], 404);
        }
    }

    public function view() {
        $departaments = $this->jobService->getAllgetAllDepartament();
        $departament_categories = $this->jobService->getAllDepartament_Categories();
        $statuss = $this->jobService->getAllgetAllStatus();
        return view('newJobVacany', [
            'departament_categories' => $departament_categories,
            'departaments' => $departaments,
            'statuss' => $statuss
        ]);
    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',

        ]);

        $user = $this->userService->create($validateData);
        return response()->json([
            'message' => 'Usuário inserido!',
            'user' => $user,
        ], 201);
        
    }
}
