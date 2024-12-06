<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel 
{
    protected $routeMiddleware = [
        'check.login' => \App\Http\Middleware\LoginMiddleware::class,

    ];
}

