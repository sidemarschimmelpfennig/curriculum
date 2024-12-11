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
        if(Auth::check() && !$request->is('api/register/login')) {
            return redirect('api/register/login');

        }

        return $next($request);
    }
}

