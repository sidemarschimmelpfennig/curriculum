<?php

use Illuminate\Http\Request;

ini_set('memory_limit', '1024M');
define('LARAVEL_START', microtime(true));

// Verificar se a aplicação está em modo de manutenção...

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registrar o autoloader do Composer...
require __DIR__.'/../vendor/autoload.php';

// Inicializar o Laravel e tratar a requisição...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
