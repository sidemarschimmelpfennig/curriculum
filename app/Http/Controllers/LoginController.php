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
        try {
            // Validação das credenciais de login
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // Verifica se o usuário existe e a senha está correta
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                // Se as credenciais forem válidas, gerar o token
                $token = $user->createToken('AccessToken')->plainTextToken;
    
                return response()->json([
                    'success' => true,
                    'message' => 'Usuário logado com sucesso!',
                    'access_token' => $token, // Retorna o token para o frontend
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Credenciais inválidas!',
                ], 401);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'request' => $request->all()
            ]);
        }
    }
}