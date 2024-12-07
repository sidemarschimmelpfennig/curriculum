<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Realize o login para prosseguir!',
            ], 401);
        }

        $user = Auth::user();

        // Se for diferente de admin vai bloquear e ponto kk
        if ($request->is('v1/admin/*') && $user->is_admin !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',
            ], 403);
        }

        // Se for diferente de candidato vai bloquear e mt triste
        if ($request->is('v1/*') && $user->is_admin !== 0) {
            return response()->json([
                'success' => false,
                'message' => 'Acesso não autorizado!',
            ], 403);
        }

        // Se tudo estiver bagual, vai passar
        return $next($request);
    }
}