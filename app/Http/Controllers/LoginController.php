<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\{
    Support\Facades\Hash,
    Http\Request
    
};

use App\Models\User;
use Illuminate\Container\Attributes\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', $credentials['email'])->first();

            if(!$user)
            {
                return response()->json([
                    'message' => 'User não encontrado',
                    'user' => $user
                ]);
            }

            if($user && Hash::check($credentials['password'], $user->password))
            {
                return response()->json('logado');

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