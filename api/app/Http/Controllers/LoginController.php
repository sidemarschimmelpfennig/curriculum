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
        try {
            $data = $request->validate([
                'email' => 'required|string',
                'password' => 'required'

            ]);


            $getUser = $this->userService->findByEmail($data['email']);
            $getCandidate = $this->candidateService->findByEmail($data['email']);
        
            if(!empty($getUser))
            {
                return $this->login($data, $getUser);
                
            }
            
            if(!empty($getCandidate))
            {
                return $this->login($data, $getCandidate);
            
            }

            return response()->json('não encontrado');
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro no login',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'request' => $request->all()
            ], 200);
        
        }
        
    }

    public function login(array $data, object $currenteUser)
    {
        if(Hash::check($data['password'], $currenteUser->password))
        { 
            try {
                $token = $currenteUser->createToken('AccessToken')->plainTextToken;
                return response()->json([
                    'success' => true,
                    'message' => "Usuario " . $currenteUser->full_name. " Logado!",
                    'token' => $token,
                    'full_name' => $currenteUser->full_name,
                    'currenteUser' => $currenteUser,
                    'is_admin' => $currenteUser->is_admin
    
                ], 200)->header('Content-Type', 'application/json');
            
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Erro ao logar',
                    'th' => $th->getMessage(),
                    'line' => $th->getLine(),
                    'file' => $th->getFile(),
    
                ], 200);
                
            }
            
        } else {
            return response()->json([
                'message' => 'Senha incorreta'
            ], 200);

        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Usuário deslogado com sucesso!',  
        ]);
       
    }

    public function getIP(Request $request)
    {
        try {
            $ip = $request->ip();
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