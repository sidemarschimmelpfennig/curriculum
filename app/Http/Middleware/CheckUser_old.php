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
        dd('A');

        return $next($request);
    }
}

