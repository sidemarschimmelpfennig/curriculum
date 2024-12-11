<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\{
    Support\Facades\Hash,
    Support\Facades\Auth,
    Http\Request
    
};

use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            
            $user = User::where('email', $request['email'])->first();

            if(!$user)
            {
                
                return response()->json([
                    'message' => 'User não encontrado',
                    'user' => $user,
                    'request' => $request->all()

                ]);
            }

            if($user && Hash::check($request->password, $user->password))
            {
                return response()->json([
                    'message' => 'Login bem-sucedido',
                    'user' => $user,

                ]);
            
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
