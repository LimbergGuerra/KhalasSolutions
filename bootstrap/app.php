<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: file_exists(__DIR__.'/../routes/web.php') ? __DIR__.'/../routes/web.php' : null,
        commands: file_exists(__DIR__.'/../routes/console.php') ? __DIR__.'/../routes/console.php' : null,
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,  // ✅ Asegurar la ruta correcta
            'admin' => \App\Http\Middleware\AdminMiddleware::class, // ✅ Asegurar la ruta correcta
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
