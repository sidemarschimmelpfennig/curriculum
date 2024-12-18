<?php

namespace App\Http\Controllers;

use Illuminate\{
    Support\Facades\Auth,
    Support\Facades\Hash,
    
};

use App\Http\{
    Controllers\Controller,
    Requests\LoginRequest
    
};

use App\Models\{
    User,
    Candidates,
    
};

class LoginController extends Controller
{

    public function getData(LoginRequest $request)
    {  
        try {
            $dataRequest = $request->validated();
            /*
                return response()->json([
                    'request' => $request
                ]);  
                {
                    "email": "gabikochem55@gmail.com",
                    "password": "g"
                }
            */

            $getUser = User::where('email', $dataRequest['email'])->first();
            $getCandidate = Candidates::where('email', $dataRequest['email'])->first();
        
            if($getUser)
            {
                return $this->login($dataRequest, $getUser);
                
            } else {
                return $this->login($dataRequest, $getCandidate);
            }
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao logar',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),

            ], 200);
        
        }
        
    }

    public function login(array $dataRequest, object $currenteUser)
    {
        if(Hash::check($dataRequest['password'], $currenteUser->password))
        { 
            $token = $currenteUser->createToken('AccessToken')->plainTextToken;
            return response()->json([
                'message' => "Usuario " . $currenteUser->full_name. " Logado!",
                'token' => $token,
                'user' => $currenteUser

            ], 200);
        
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
}