<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
class Kernel extends HttpKernel 
{
    protected $middleware = [
        \Illuminate\Http\Middleware\HandleCors::class,
        
    ];

    protected $middlewareGroups = [
        'web' => [
            EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Http\Middleware\HandleCors::class, 'handle'
            
        ],
    
        'api' => [
            \Illuminate\Http\Middleware\HandleCors::class, 'handle',
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            
        ],
    ];
}