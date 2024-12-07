<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel 
{
    protected $routeMiddleware = [
        'check.user' => \App\Http\Middleware\CheckUser::class,

    ];
}

