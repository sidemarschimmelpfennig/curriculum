<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\{
    Http\Request,
    Support\Facades\Auth

};

use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    public function handle(Request $request, Closure $next): Response
    {        
        if(!Auth::check()) {
            dump('Realize login!');
            return response()->json([
                'success' => false,
                'message' => 'Realize login!',
                
            ], 401);
        }

                
        if ($request->is('v1/*') && $user->is_admin != 1) {
            dump('linha 24 CheckUser');
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',
                
            ], 403);

        }

        if ($request->is('v1/*') && $user->is_admin != 0) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',

            ], 403);
            
        }

        return $next($request);
    }
}

class CheckUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->is('api/register/login'))
        {  
            dump('login');
            
        }
        
        $user = Auth::user();

        if(Auth::check() && !$request->is('api/register/login') ) {
            //dump('Realize login!');
            return response()->json([
                'success' => false,
                'message' => 'Realize login!',
                'user' => $user
                
            ], 401);
        }
        
        if ($request->is('v1/admin/*') && $user->is_admin != 1) {
            dump('linha 24 CheckUser');
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',
                
            ], 403);

        }

        if ($request->is('v1/*') && $user->is_admin != 0) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',

            ], 403);
            
        }

        return $next($request);
    }
    
}
