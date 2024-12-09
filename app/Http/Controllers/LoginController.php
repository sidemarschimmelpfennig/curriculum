<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\{
    Support\Facades\Hash,
    Http\Request
    
};

use App\Models\Curriculum;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $email = $request['email']; 
            $password = $request['password']; 

            $user = Curriculum::where('email', $email)->first();

            if(!$user)
            {
                return response()->json('User não encontrado');
            }

            if($user && Hash::check($password, $user->password))
            {
                $user = Auth::login($user);

                if(Auth::check())
                {   
                    //return redirect('/api/v1/all/job-vacancies');

                    return response()->json([
                        'login' => 'Logado'
                    ]);
                }
                

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
