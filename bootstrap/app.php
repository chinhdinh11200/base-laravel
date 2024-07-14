<?php

use App\Exceptions\TestException;
use App\Http\Middleware\Test2Middleware;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'test' => TestMiddleware::class,
            'test2' => Test2Middleware::class,
        ]);

        $middleware->validateCsrfTokens(except: ['api/*']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->reportable(function (TestException $e) {
            dd($e);
        });

        // $exceptions->
    })->create();
