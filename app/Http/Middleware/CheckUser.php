<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('register, login-page')) {
            return $next($request);

        }
        $user = Auth::user();

        if ($request->is('v1/admin/*') && $user->is_admin !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',
            ], 403);
        }

        if ($request->is('v1/*') && $user->is_admin !== 0) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',
            ], 403);
        }

        return $next($request);
    }
}