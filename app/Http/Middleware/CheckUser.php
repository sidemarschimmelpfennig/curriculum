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
        if(!Auth::guard('sanctum')->check()) {
            dump('Realize login!');
            return response()->json([
                'success' => false,
                'message' => 'Realize o login para prosseguir!',
                
            ], 401);
        }

        $user = Auth::guard('sanctum')->user();
                
        if ($request->is('v1/admin*') && $user->is_admin != 1) {
            dump('linha 24 CheckUser');
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',
                
            ], 403);

        }

        if ($request->is('v1/candidates*') && $user->is_admin != 0) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',

            ], 403);
            
        }

        return $next($request);
    }
}

