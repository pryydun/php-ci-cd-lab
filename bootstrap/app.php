<?php

use App\Http\Middleware\CheckProductAccess;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // Реєстрація власного Middleware
        $middleware->alias([
            'product.access' => CheckProductAccess::class,
        ]);

        // Тимчасове вимкнення CSRF для тестування POST-запитів
        $middleware->validateCsrfTokens(except: [
            'products',
            'products/*',
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
