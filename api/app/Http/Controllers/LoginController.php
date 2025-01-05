<?php

namespace App\Http\Controllers;

use Illuminate\{
    Support\Facades\Auth,
    Support\Facades\Hash,
    Http\Request,
    
};

use App\Http\{
    Controllers\Controller,
    
};

use App\Services\{
    UserService,
    CandidateService

};

class LoginController extends Controller
{
    protected $userService;
    protected $candidateService;

    public function __construct(UserService $userService, CandidateService $candidateService)
    {
        $this->userService = $userService;
        $this->candidateService = $candidateService;
        
    }

    public function getData(Request $request)
    {  
        //return response()->json($request->all());
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required'

        ]);
        
        $getUser = $this->userService->findByEmail($data['email']);
        $getCandidate = $this->candidateService->findByEmail($data['email']);
        $this->getIP($request);

        if(!empty($getUser))
        {
            return $this->login($data['password'], $getUser);
            
        }
        
        if(!empty($getCandidate))
        {
            return $this->login($data['password'], $getCandidate);
        
        }

        return response()->json([
            'success' => false,
            'message' => 'Não encontrado'
        ]);
        
    }

    public function login(string $password, object $currenteUser)
    {
        try {
            if(Hash::check($password, $currenteUser->password))
            { 
                $token = $currenteUser->createToken('AccessToken')->plainTextToken;
                    
                return response()->json([
                    'success' => true,
                    'message' => "Usuario " . $currenteUser->full_name. " Logado!",
                    'token' => $token,
                    'full_name' => $currenteUser->full_name,
                    'currenteUser' => $currenteUser,
                    'is_admin' => $currenteUser->is_admin
    
                ], 200)->header('Content-Type', 'application/json');
            
            } else {
                return response()->json([
                    'message' => 'Senha incorreta'
                ], 200);
    
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
            ]);
            
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Usuário deslogado com sucesso!',  
        ]);
       
    }

    public function getIP(object $data)
    {
        try {
            $ip = $data->ip();
            $file = fopen('IPs.txt', 'a');
            fwrite($file, $ip . " IP");
            fclose($file);
            //$path = public_path('uploads/IPs.txt');
            
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Erro ao pegar o IP',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
            ], 400);
        }
        

    }
}