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
        $user = Auth::guard('sanctum')->user();
        
        if(!Auth::guard('sanctum')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Realize o login para prosseguir!',
                
            ], 401);
        }
        
        if ($request->is('v1/admin/*') && $user->is_admin != 1) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',
                
            ], 401);

        }

        if ($request->is('v1/candidates/*') && $user->is_admin != 0) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',

            ], 401);
            
        }

        return $next($request);
    }
}

