<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validação das credenciais de login
        /*$credentials =*/ $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            
        ]);


        if ($request->email == null){
            return response()->json([
                'message' => 'E-mail não informado!'
            ], 400);
        }
            // Verifica se o usuário existe e a senha está correta
            $user = User::where('email', $request->email)->first();

        if(!$user)
        {
            return response()->json([
                'message' => 'Usuario não encontrado!',
            ], 404);
        }

        // Se as credenciais forem válidas, gerar o token
        if ($user && Hash::check($request->password, $user->password)) {

            $token = $user->createToken('AccessToken')->plainTextToken;
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