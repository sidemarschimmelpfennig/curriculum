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
<<<<<<< HEAD
=======
            \Illuminate\Http\Middleware\HandleCors::class, 'handle',
>>>>>>> 453bb375831a5453ff0ed02c9a93222308ef7131
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            
        ],
    ];
}