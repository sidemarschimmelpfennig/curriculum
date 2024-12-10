<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;

use App\Models\Curriculum;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');

            $user = User::where('email', $credentials['email'])->first();

            if(!$user)
            {
                return response()->json('User não encontrado');
            }

            if($user && Hash::check($password, $user->password))
            {
                return response()->json('logado');
            }

            return response()->json([
                'sucess' => false,
                'message' => 'Senha incorreta'

            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'request' => $request->all()
            ]);
        }

        /*public function logout(Request $request){
            $request->user()->tokens()->delete();

            return response()->json([
                'message' => 'Logout realizdo com sucesso!'
            ], 200);
        }*/
    }
}
