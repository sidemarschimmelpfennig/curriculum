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

use App\Models\{
    User,
    Candidates,
    
};

class LoginController extends Controller
{

    public function getData(Request $request)
    {  
        //return response()->json($request->all());
        try {
            $dataRequest = $request->validate([
                'email' => 'required|string',
                'password' => 'required'

            ]);

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
                'success' => true,
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