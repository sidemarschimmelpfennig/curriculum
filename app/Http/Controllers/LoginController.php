<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\{
    Support\Facades\Auth,
    Support\Facades\Hash,
    Http\Request
    
};

use App\Models\{
    User,
    Candidates,
};

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validação das credenciais de login
        /*$credentials =*/ $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            
        ]);

        // Verifica se o usuário existe e a senha está correta
        $user = User::where('email', $request->email)->first();
        $candidate = Candidates::where('email', $request->email)->first();

        if(!$user)
        {
            return response()->json([
                'message' => 'Usuario não encontrado!',
            ], 404);
        }

        if(!$candidate)
        {
            return response()->json([
                'message' => 'Candidato não encontrado!',
            ], 404);
        }


        // Se as credenciais forem válidas, gerar o token
        if ($user && Hash::check($request->password, $user->password) || $candidate && Hash::check($request->password, $candidate->password)) {

            $token = $user->createToken('AccessToken')->plainTextToken;
            $token = $candidate->createToken('AccessToken')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login realizado com sucesso!',
                'access_token' => $token,

            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Senha incorreta!',

            ], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Vai te lasca, deslogado, perdeu'
            
        ]);
       
    }
}