<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\{
    Middleware,
    Exceptions
};

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) { 
        $middleware->append(\App\Http\Middleware\CheckUser::class);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
