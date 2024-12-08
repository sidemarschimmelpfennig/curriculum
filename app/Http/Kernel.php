<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel 
{

    protected $middleware = [
        'api' => [
            \App\Http\Middleware\CheckUser::class,
        ]        
    ];

    protected $routeMiddleware = [
        'check.user' => \App\Http\Middleware\CheckUser::class,

    ];
}

